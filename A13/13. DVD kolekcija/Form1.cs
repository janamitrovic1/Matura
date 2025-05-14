using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Collections;
using System.Data.SqlClient;
using System.Reflection.Emit;
//using System.Windows.Forms.DataVisualization.Charting;

namespace _13.DVD_kolekcija
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();

        }
        List<Producent> producenti;
        SqlConnection konekcija;
        SqlCommand komanda;
        DataTable dt;
        SqlDataAdapter da;
        void Konekcija()
        {
            konekcija = new SqlConnection();

            konekcija.ConnectionString = @"Data Source = (LocalDB)\MSSQLLocalDB; AttachDbFilename = |DataDirectory|\DVD_kolekcija.mdf; Integrated Security = True; Connect Timeout = 30";
            komanda = new SqlCommand();
            komanda.Connection = konekcija;
            dt = new DataTable();
            da = new SqlDataAdapter();
        }
        public void brisiTabelu()
        {
            dt.Rows.Clear();
            dt.Columns.Clear();
        }
        private void listBox1_SelectedIndexChanged(object sender, EventArgs e)
        {
           textBox1.Text = dt.Rows[listBox1.SelectedIndex][0].ToString();
           textBox2.Text = dt.Rows[listBox1.SelectedIndex][1].ToString();
           textBox3.Text = dt.Rows[listBox1.SelectedIndex][2].ToString();

        }

        private void listBox1_SelectedValueChanged(object sender, EventArgs e)
        {

        }

        private void label9_Click(object sender, EventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {
           
        }

        private void button4_Click(object sender, EventArgs e)
        {
            // this.Close();
            
        }

        private void button3_Click(object sender, EventArgs e)
        {
         
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            Konekcija();
            komanda.CommandText = "SELECT producentid, ime, email FROM producent ORDER BY producentid";
            da.SelectCommand = komanda;
            da.Fill(dt);
            listBox1.Font = new Font("Consolas", 10);
            producenti = new List<Producent>();
            for (int i = 0; i < dt.Rows.Count; i++)
                producenti.Add(new Producent(dt.Rows[i][0].ToString(), dt.Rows[i][1].ToString(), dt.Rows[i][2].ToString()));
            listBox1.DataSource = producenti;
        }
    

    
        private void button1_Click(object sender, EventArgs e)
    {
         
        }

        private void panel1_Paint(object sender, PaintEventArgs e)
        {

        }
        //UPDATE
        private void toolStripMenuItem1_Click(object sender, EventArgs e)
        {
            Konekcija();
            komanda.CommandText = "UPDATE Producent SET ime=@ime, email = @email WHERE " +
                "producentid = @producentid";
            komanda.Parameters.AddWithValue("@producentid",textBox1.Text);
            komanda.Parameters.AddWithValue("@ime",textBox2.Text);
            komanda.Parameters.AddWithValue("@email",textBox3.Text);
            try
            {
                konekcija.Open();
                komanda.ExecuteNonQuery();
                MessageBox.Show("Uspesna izmena");
            }
            catch
            {
                MessageBox.Show("Greska");
            }
            finally
            {
                konekcija.Close();
            }
            Form1_Load(sender, e);
        }
        //ANALIZA
        private void toolStripMenuItem2_Click(object sender, EventArgs e)
        {
            Form2 form2 = new Form2();
            form2.ShowDialog();
        }
        //O APLIKACIJI
        private void toolStripMenuItem3_Click(object sender, EventArgs e)
        {
           
        }
        //IZLAZ
        private void toolStripMenuItem4_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }
    }
}
