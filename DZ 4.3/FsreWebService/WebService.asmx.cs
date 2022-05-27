using MySqlConnector;
using System.Data;
using System.Web.Services;

namespace FsreWebService
{
    /// <summary>
    /// Summary description for WebServis1
    /// </summary>
    [WebService(Namespace = "http://tempuri.org/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
    // To allow this Web Service to be called from script, using ASP.NET AJAX, uncomment the following line. 
    // [System.Web.Script.Services.ScriptService]
    public class WebServis1 : System.Web.Services.WebService
    {

        public static DataTable SendQuery(string q)
        {
            string connString = "SERVER=localhost" + ";" +
                "DATABASE=rnwa;" +
                "UID=root;" +
                "PASSWORD=;";

            MySqlConnection cnMySQL = new MySqlConnection(connString);

            MySqlCommand cmdMySQL = cnMySQL.CreateCommand();

            MySqlDataReader reader;

            cmdMySQL.CommandText = q;

            cnMySQL.Open();

            reader = cmdMySQL.ExecuteReader();

            DataTable dt = new DataTable();
            dt.Load(reader);


            cnMySQL.Close();

            return dt;

        }

        [System.Web.Services.WebMethod]
        public float BamToEur(float bam)
        { 
            return (float)(bam * 1.96);
        }
        
        [System.Web.Services.WebMethod]
        public float EurToBam(float eur)
        { 
            return (float)(eur * 0.51);
        }
   
        [System.Web.Services.WebMethod]
        public DataTable GetPostByPostId(string pid)
        {
            string q = "select * from post where pid=" + pid;
            return SendQuery(q);
        }

        [System.Web.Services.WebMethod]
        public DataTable GetCommentByCommentId(string cid)
        {
            string q = "select * from comments where cid=" + cid;
            return SendQuery(q);
        }


    }
}
