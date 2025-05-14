using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace _13.DVD_kolekcija
{
    public class Producent
    {
        public string sifra;
        public string ime;
        public string email;
        public Producent(string sifra, string ime, string email)
        {
            this.sifra = sifra;
            this.ime = ime;
            this.email = email;
        }
        public override string ToString()
        {
            return sifra.PadRight(3) + "\t" + ime.PadRight(30) + "\t" + email.PadRight(30);

        }
    }
}
