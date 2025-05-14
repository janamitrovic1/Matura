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
using System.Runtime.Remoting.Contexts;

namespace _13.DVD_kolekcija
{
    public partial class Form2 : Form
    {
        public Form2()
        {
            InitializeComponent();
        }
        SqlConnection konekcija;
        SqlCommand komanda;
        DataTable dt;
        SqlDataAdapter da;

        void Konekcija()
        {
            konekcija = new SqlConnection();

            konekcija.ConnectionString = @"Data Source = (LocalDB)\MSSQLLocalDB; AttachDbFilename = |DataDirectory|\DVD_kolekcija.mdf; Integrated Security = True; Connect Timeout = 30";
            komanda = new SqlCommand();
            // komanda = new SqlCommand();
            komanda.Connection = konekcija;
            dt = new DataTable();
            da = new SqlDataAdapter();
        }
        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
        }
        //podesi CHART

        void prikaziChart()
        {
            if (chart1.Titles.Count > 0)
            {
                chart1.Titles[0].Text = "UKUPAN BROJ FILMOVA PRODUCENTA";
            }
            else
                chart1.Titles.Add("UKUPAN BROJ FILMOVA SVAKOG PRODUCENTA");
            chart1.Series["Producent"].IsValueShownAsLabel = true;
            Random r = new Random();
            chart1.Series["Producent"].Points.Clear();
            for (int i = 0; i < dataGridView1.Rows.Count; i++)
            {
                chart1.Series["Producent"].Points.AddXY(dataGridView1.Rows[i].Cells[0].Value, dataGridView1.Rows[i].Cells[1].Value);
                chart1.Series["Producent"].Points[i].Color = Color.FromArgb(r.Next(255),r.Next(255), r.Next(255));
                chart1.ChartAreas["ChartArea1"].AxisX.Interval = 1;
            }
            
        }
            //PRIKAZI
        private void button1_Click(object sender, EventArgs e)
        {
            Konekcija();
            string select = "SELECT producent.Ime AS [PRODUCENT], COUNT(producirao.filmID) AS [BROJ FILMOVA]";
            string from = "FROM producent INNER JOIN producirao ON producirao.producentID = producent.producentID";
            string group = "GROUP BY producent.Ime";
            komanda.CommandText = select + " "+ from + " " + group;
            da.SelectCommand = komanda;
            da.Fill(dt);
            dataGridView1.DataSource = dt;
            dataGridView1.Columns[0].Width = 3 * (dataGridView1.Width - dataGridView1.RowHeadersWidth)/4;
            dataGridView1.Columns[1].Width = (dataGridView1.Width - dataGridView1.RowHeadersWidth) / 4;
            prikaziChart();
        }

        private void Form2_Load(object sender, EventArgs e)
        {
                
        }
        }
    } 
