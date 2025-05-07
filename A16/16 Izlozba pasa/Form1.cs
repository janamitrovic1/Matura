using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Data.SqlClient;
using System.Collections;
using System.Windows.Forms.DataVisualization.Charting;
using System.Runtime.Remoting.Contexts;
using System.IO;
using System.Reflection.Emit;
using static System.Windows.Forms.VisualStyles.VisualStyleElement;

namespace _16_Izlozba_pasa
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }
        SqlConnection konekcija;
        SqlCommand komanda;
        DataTable dt;
        SqlDataAdapter da;
        public void Konekcija()
        {
            konekcija = new SqlConnection();
            konekcija.ConnectionString = @"Data Source=(LocalDB)\MSSQLLocalDB;AttachDbFilename=|DataDirectory|\Izlozba_pasa.mdf; Integrated Security=True";
            komanda = new SqlCommand();
            komanda.Connection = konekcija;
            dt = new DataTable();
            da = new SqlDataAdapter();
        }

        public void Brisi_tabelu()
        {
            dt.Rows.Clear();
            dt.Columns.Clear();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            Konekcija();
            komanda.CommandText = "SELECT pas_id,ime FROM pas";
            da.SelectCommand = komanda;
            da.Fill(dt);
            for(int i = 0;i<dt.Rows.Count; i++)
            {
                string id = dt.Rows[i][0].ToString();
                string ime = dt.Rows[i][1].ToString();
                comboBox1.Items.Add(id + " - " + ime);
            }
            Brisi_tabelu();
            komanda.CommandText = "SELECT id_izlozbe, mesto, datum FROM izlozba";
            da.SelectCommand = komanda;
            da.Fill(dt);
            for(int i = 0; i<dt.Rows.Count; i++)
            {
                string id = dt.Rows[i][0].ToString();
                string mesto = dt.Rows[i][1].ToString();
                string datum = dt.Rows[i][2].ToString();
                comboBox2.Items.Add(id+" - "+mesto + " - " + datum);
                if(DateTime.Parse(datum)<DateTime.Now)
                    comboBox4.Items.Add(id+" - "+mesto+" - "+datum);
            }
            Brisi_tabelu();
            komanda.CommandText = "SELECT id_kategorije, naziv FROM kategorija";
            da.SelectCommand = komanda;
            da.Fill(dt);
            for(int i=0; i<dt.Rows.Count; i++)
            {
                string id = dt.Rows[i][0].ToString();
                string naziv= dt.Rows[i][1].ToString();
                comboBox3.Items.Add(id+" - "+naziv);
            }
            Brisi_tabelu();
        }
 
      
        public bool VecPrijavljen(string pasId, string izlozbaId, string kategorijaId)
        {
            Konekcija();
            konekcija.Open();
            komanda.Parameters.Clear();
            komanda.CommandText = "SELECT COUNT(*) FROM rezultat WHERE id_izlozbe = @izlozba AND " +
                "id_kategorije = @kategorija AND pas_id = @pas";
            komanda.Parameters.AddWithValue("@izlozba", izlozbaId);
            komanda.Parameters.AddWithValue("@kategorija", kategorijaId);
            komanda.Parameters.AddWithValue("@pas", pasId);
            int br = int.Parse(komanda.ExecuteScalar().ToString());
            konekcija.Close();
            return br>0;
        }
     
        DateTime datum_izlozbe()
        {
            Konekcija();
            string izlozbaId = comboBox2.Text.Split('-')[0];
            komanda.CommandText = "SELECT datum FROM Izlozba WHERE id_izlozbe=@izlozbaId";
            komanda.Parameters.AddWithValue("@izlozbaId",izlozbaId) ;
            da.SelectCommand = komanda;
            da.Fill(dt);
            return Convert.ToDateTime(dt.Rows[0][0]);
        }
      
        void zakasnela_prijava()
        {
            if (datum_izlozbe() <= DateTime.Now.AddDays(2))
            {
                MessageBox.Show("Zakasnela prijava!");
                comboBox1.Focus();
            }
        }

        void prikaziChart()
        {
            chart1.Series.Clear();
            Series rezultat = new Series("Rezultat:");
            rezultat.IsValueShownAsLabel = true;
            rezultat.Points.Clear();
            rezultat.ChartType = SeriesChartType.Pie;
            chart1.ChartAreas[0].Area3DStyle.Enable3D = true;
            chart1.ChartAreas[0].Area3DStyle.Inclination = 45;
            chart1.ChartAreas[0].Area3DStyle.Rotation = 20;
            chart1.ChartAreas[0].Area3DStyle.LightStyle = LightStyle.Realistic;
            for (int i = 0; i < dt.Rows.Count; i++)
            {
                DataRow red = dt.Rows[i];
                rezultat.Points.AddXY(red[1].ToString(), red[2].ToString());
            }
            chart1.Visible = true;
            if (chart1.Titles.Count > 0)
                chart1.Titles[0].Text = "Izlozbe pasa 2025";
            else
                chart1.Titles.Add("Izlozbe pasa 2025");
            chart1.Series.Add(rezultat);
        }
        private void comboBox2_SelectedIndexChanged(object sender, EventArgs e)
        {
           zakasnela_prijava();
       
        }
        private void comboBox3_SelectedIndexChanged(object sender, EventArgs e)
        {
            zakasnela_prijava();
            
        }
        //prijava na izlozbu
        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                string pas = comboBox1.Text.ToString();
                string pasId = pas.Split('-')[0];
                string izlozba = comboBox2.Text.ToString();
                string izlozbaId = izlozba.Split('-')[0];
                string kategorijaId = comboBox3.Text.Split('-')[0];
                if(VecPrijavljen(pasId, izlozbaId, kategorijaId))
                {
                    MessageBox.Show("Pas je vec prijavljen");
                    return;
                }
                Konekcija();
                konekcija.Open();
                komanda.CommandText = "INSERT INTO rezultat(id_izlozbe, id_kategorije,pas_id)" +
                    "VALUES (@izlozba, @kategorija, @pas)";
                komanda.Parameters.AddWithValue("@izlozba", izlozbaId);
                komanda.Parameters.AddWithValue("@kategorija", kategorijaId);
                komanda.Parameters.AddWithValue("@pas", pasId);
                komanda.ExecuteNonQuery();
                MessageBox.Show("Uspesan unos!");
            }
            catch 
            {
                MessageBox.Show("Neupsean unos");
            }
            finally
            {
                konekcija.Close();
            }
        }

        //zatvori aplikaciju
        private void button2_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }
       //prikazi u dataGridView i Chart
        private void button3_Click(object sender, EventArgs e)
        {
            string selectovanaIzlozba = comboBox4.Text;
            if(selectovanaIzlozba == string.Empty)
            {
                MessageBox.Show("Prvo odaberite izlozbu");
                return;
            }
            string izlozbaId = selectovanaIzlozba.Split('-')[0];
            Konekcija();
            komanda.CommandText = @"
                SELECT K.id_kategorije AS [Sifra], K.naziv AS [Nazov kategorije], COUNT (R.rezultat) AS [Broj Pasa] 
                FROM Kategorija K INNER JOIN Rezultat R ON R.id_kategorije = K.id_kategorije 
                WHERE R.id_izlozbe = @izlozbaId
                GROUP BY K.id_kategorije, K.naziv 
                ORDER BY K.id_kategorije";
            komanda.Parameters.AddWithValue("@izlozbaId", izlozbaId);
            da.SelectCommand = komanda;
            da.Fill(dt);
            dataGridView2.DataSource = dt;
            prikaziChart();
        }

        private void button5_Click(object sender, EventArgs e)
        {
          
        }
       

     

        private void button6_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void chart1_Click(object sender, EventArgs e)
        {
   
        }

        private void comboBox1_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

        private void button4_Click(object sender, EventArgs e)
        {
            this.Close();
        }
        //избор изложбе 
        private void comboBox4_SelectedIndexChanged(object sender, EventArgs e)
        {
            string selectovanaIzlozba = comboBox4.Text;
            if(selectovanaIzlozba == "")
            {
                MessageBox.Show("Prvo odaberite izlozbu");
                return;
            }
            string izlozbaId=selectovanaIzlozba.Split('-')[0];
            Konekcija();
            komanda.CommandText = "SELECT COUNT(*) AS prijavljeni, COUNT(rezultat) AS ucestvovali FROM" +
                " rezultat WHERE id_izlozbe = @izlozbaId";
            komanda.Parameters.AddWithValue("@izlozbaId",izlozbaId);
            Brisi_tabelu();
            da.SelectCommand = komanda;
            da.Fill(dt);
            string prijavljeni = dt.Rows[0][0].ToString();
            string ucestvovali = dt.Rows[0][1].ToString();
            label9.Text = prijavljeni;
            label10.Text = ucestvovali;
           
        }
    }
    }

