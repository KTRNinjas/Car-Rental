<?php
session_start();
$path=dirname(__DIR__,1);
include_once($path.DIRECTORY_SEPARATOR."Controller".DIRECTORY_SEPARATOR."AccountController.php");
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account információk</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            text-align: center;
            box-sizing: border-box;
        }

        body {
            display: grid;
            place-items: center;
        }

        .wrapper {
            height: 50px;
            width: 200px;
            /*border-radius: 5px;
            background:#fff;*/
            display: flex;
            align-items: center;
            /*border: 1px solid #0069D9;*/
            padding: 30px 10px;
            justify-content: space-evenly;
        }

        .wrapper .option {
            height: 100%;
            width: 100%;
            border: 1px solid lightgray;
            border-radius: 5px;
            margin: 0 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
            padding: 20px 15px;
            justify-content: space-evenly;
            transition: all 0.3s ease;
        }

        .option1 {
            border-color: gray;
            background: gray;
        }

        .option1 span {
            color: #fff;
        }

        .option2 {
            border-color: gray;
            background: #fff;
        }

        .option2 span {
            color: gray;
        }

        /*.wrapper input[type="radio"] {
            display: none;
        }*/
        #option1{
            display: none; 
        }
        #option2{
            display: none; 
        }
        .company {
            display: none;
        }
    </style>
    <script>
        function privateSelected() {
            document.querySelector("#cim").innerHTML = "Lakcím";
            let companyinfo;
            document.querySelector(".option1").style = "border-color: gray; background: gray;";
            document.querySelector(".option1").querySelector("span").style = "color: #fff;";
            document.querySelector(".option2").style = "border-color: gray; background: #fff;";
            document.querySelector(".option2").querySelector("span").style = "color: gray;";
            companyinfo = document.querySelectorAll(".company");
            companyinfo.forEach(element => {
                element.style = "display: none"
                element.required = false;
            });
        }

        function companySelected() {
            document.querySelector("#cim").innerHTML = "Telephely"
            document.querySelector(".option1").style = "border-color: gray; background: #fff;";
            document.querySelector(".option1").querySelector("span").style = "color: gray;";
            document.querySelector(".option2").style = "border-color: gray; background: gray;";
            document.querySelector(".option2").querySelector("span").style = "color: #fff;";
            let companyinfo;
            companyinfo = document.querySelectorAll(".company");
            companyinfo.forEach(element => {
                element.style = "display: inline-block";
                element.required = true;
            });
        }
    </script>
</head>

<body>
    <div class="wrapper">
        <label for="option1" class="option option1">
            <span>Magán</span>
        </label>
        <label for="option2" class="option option2">
            <span>Céges</span>
        </label>
    </div>
    <form action="" method="post" id="accountForm">
        <h1 id="cim">Lakcím</h1>
        <input type="radio" name="privateSelect" id="option1" onclick="privateSelected()" checked>
        <input type="radio" name="companySelect" id="option2" onclick="companySelected()">
        <?php printAccountInformation()?>
        <input type="submit" name="toContractCreation" value="tovább">
    </form>
</body>

</html>