<!DOCTYPE html>
<html lang="">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
        }
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}
        #resultDiv {
            overflow-x: auto;
            border-radius: 20px;
        }
        th {text-align: left;}
        .menu {
            background-color:gray;
            padding:8px;
            margin-top:7px;
            width:100%;
            text-align:center;
        }
        .menu a {
            color:black;
            font-size: x-large;
            margin: 10px 40px 10px;
        }
        .header{
            background-color:gray;
            padding:15px;
            text-align:center;
        }
        .main {
            float:left;
            width:80%;
            margin-bottom: 50px;
        }

        .main article{
            background-color: gray;
            margin-top: 25px;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            border-radius: 20px;
            color: black;
            padding-bottom: 15px;

        }

        .main article img{
            border-radius: 50%;
            width: 50%;
            margin-left: 10px;
            margin-top: 10px;

        }

        .main h4{
            margin-left: 20px;

        }

        .main div{
            display:table-cell;

        }

        div.articleLeft{
            width: 25%;
        }


        div.articleRight{
            width: 75%;
            vertical-align: top;
            padding-top: 15px;
        }

        div.articleRight img{
            border-radius: 0;
            width: 70%;
        }



        .aside {
            background-color:gray;
            float:right;
            width:20%;
            height: 100%;
            max-height: 100%;
            padding:15px;
            margin-top:7px;
            text-align:center;
            color: black;
        }

        .aside a {
            padding-top: 20px;
            text-decoration: none;
            color: black;
            display: block;
            transition: 0.3s;
        }

        .aside a:hover {
            color: #f1f1f1;
        }


        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 5%;
            background-color: black;
            color: white;
            text-align: center;
        }

        #profilePic{
            border-radius: 50%;
            width: 85%;
        }

        /* Style inputs, select elements and textareas */
        input[type=text], select, textarea{
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical;
        }

        /* Style the label to display next to the inputs */
        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        /* Style the submit button */
        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        /* Style the container */
        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        /* Floating column for labels: 25% width */
        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        /* Floating column for inputs: 75% width */
        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }


        @media only screen and (max-width:620px) {
            /* For mobile phones: */

            body {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }
            .header {
                width: 100%;
                order: 1;
            }
            .main {
                width: 100%;
                order: 2;
            }
            .menu {
                width: 100%;
                order: 3;
            }
            .aside {
                width: 100%;
                order: 4;
            }
            #profilePic{
                width: 30%;
            }
            .main article{
                width: 100%
            }
            #resultDiv {
                overflow-x: auto;
                width: 100%;
            }


            .footer {
                width: 100%;
                order: 5;
            }
            .col-25, .col-75, input[type=submit] {
                width: 100%;
                margin-top: 0;
            }





        }
    </style>
    <title></title>
</head>
<body style="font-family:Verdana;color:#aaaaaa;">

<div class="header">
    <h1>Projekt</h1>
</div>

<div class="menu">
    <a href="/posts">Objave</a>
    <a href="/users">Korisnici</a>
    <a href="/comments">Komentari</a>
</div>

<div class="main">

    @yield('content')

</div>

<div class="aside">
    <img src="resources/profile_pic.png" id="profilePic">
    <p style="font-family: Georgia, 'Times New Roman', Times, serif; font-size: 25px;">Marko Marić</p>
    <a href="#">Pošalji povratnu informaciju</a>
    <a href="#">Postavke</a>
    <a href="#">Odjava</a>
</div>

<div class="footer">Sveučilište u Mostaru</div>

</body>
</html>
