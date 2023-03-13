<?php
session_start();
$_SESSION['name'] = "Zoja";
?>
<!doctype html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edelweiss Aegerter</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <!-- <link rel="stylesheet" href="css/styles.css"> -->
    <link rel="icon" type="image/png" href="images\favicon.png">


    <style>
        .up-vote .fa-angle-up,
        .down-vote .fa-angle-down {
            cursor: pointer;
        }

        body {
            margin: 0;
            padding: 0;
            background: #434242;
            color: #fff;
        }

        .content h1,
        p {
            text-align: center;
            margin: 40px 0;
        }

        footer p {
            text-align: center;
        }

        .btn-area {
            text-align: center;
        }

        .btn-area a {
            margin: 10px 0;
            background: #ffffff;
            color: #000;
            padding: 15px;
            text-decoration: none;
            font-size: 24px;
            font-weight: bold;
            border-radius: 5px;
        }

        .btn1 {
            /*
                border-radius: 50px;
                background: #e0e0e0;
                box-shadow:  20px 20px 60px #bebebe,
                -20px -20px 60px #ffffff;
                */

            /*
                border-radius: 55px;
                background: #e0e0e0;
                box-shadow:  25px 25px 55px #707070,
                -25px -25px 55px #ffffff;
                */

            padding: 1.5em 5em;
            background: #efefef;
            border: none;
            border-radius: .5rem;
            color: #444;
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: .2rem;
            text-align: center;
            outline: none;
            cursor: pointer;
            transition: .2s ease-in-out;
            box-shadow: -6px -6px 14px rgba(255, 255, 255, .7),
                -6px -6px 10px rgba(255, 255, 255, .5),
                6px 6px 8px rgba(255, 255, 255, .075),
                6px 6px 10px rgba(0, 0, 0, .15);

        }

        .btn2 {
            /*
                border-radius: 50px;
                background: #e0e0e0;
                box-shadow:  20px 20px 60px #bebebe,
                -20px -20px 60px #ffffff;
                }
                .content {
                    width:1000px;
                    margin:0 auto;
                    clear:both;
                }
                .col-1 {
                    float:left;
                    width:33%;
                }
                .col-1 img {
                    width:100%;
                    height:auto;
                }

                input[type=text],input[type=email] {
                    width: 100%;
                height: 48px;
                */

            padding: 1.5em 5em;
            background: #efefef;
            border: none;
            border-radius: .5rem;
            color: #444;
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: .2rem;
            text-align: center;
            outline: none;
            cursor: pointer;
            transition: .2s ease-in-out;
            box-shadow: -6px -6px 14px rgba(255, 255, 255, .7),
                -6px -6px 10px rgba(255, 255, 255, .5),
                6px 6px 8px rgba(255, 255, 255, .075),
                6px 6px 10px rgba(0, 0, 0, .15);
        }

        .prorepairch {

            /*
                position: relative;
                top: 50%; 
                right: 50%;
                transform: translate(50%,-50%);
                text-transform: uppercase;
                font-family: verdana;
                font-size: 2em;
                font-weight: 500;
                color: #f5f5f5;
                text-shadow: 1px 1px 1px #919191,
                1px 2px 1px #919191,
                1px 3px 1px #919191,
                1px 4px 1px #919191,
                1px 5px 1px #919191,
                1px 6px 1px #919191,
                1px 7px 1px #919191,
                1px 8px 1px #919191,
                1px 9px 1px #919191,
                1px 10px 1px #919191,
                1px 18px 6px rgba(16,16,16,0.4),
                1px 22px 10px rgba(16,16,16,0.2),
                1px 25px 35px rgba(16,16,16,0.2),
                1px 30px 60px rgba(16,16,16,0.4);
                */


            font-size: 70px;
            color: #0756ff;
            font-family: Verdana, Geneva, sans-serif;
            text-shadow: 0px 0px 0 rgb(-40, 39, 208),
                0px 1px 0 rgb(-45, 34, 203),
                0px 2px 0 rgb(-50, 29, 198),
                0px 3px 0 rgb(-55, 24, 193),
                0px 4px 0 rgb(-60, 19, 188),
                0px 5px 0 rgb(-65, 14, 183),
                0px 6px 0 rgb(-70, 9, 178),
                0px 7px 0 rgb(-75, 4, 173),
                0px 8px 0 rgb(-80, -1, 168),
                0px 9px 0 rgb(-85, -6, 163),
                0px 10px 0 rgb(-90, -11, 158),
                0px 11px 10px rgba(0, 0, 0, 0.6),
                0px 11px 1px rgba(0, 0, 0, 0.5),
                0px 0px 10px rgba(0, 0, 0, .2);

        }

        /*
            .class3d {
             
                position: relative;
    color: rgba(0, 0, 0, .3);
    font-size: 2em
    */

        /*
                position: relative;
  top: 35%;
  width: 100%;

  text-shadow:     0 1px 0 hsl(174,5%,80%),
	                 0 2px 0 hsl(174,5%,75%),
	                 0 3px 0 hsl(174,5%,70%),
	                 0 4px 0 hsl(174,5%,66%),
	                 0 5px 0 hsl(174,5%,64%),
	                 0 6px 0 hsl(174,5%,62%),
	                 0 7px 0 hsl(174,5%,61%),
	                 0 8px 0 hsl(174,5%,60%),
	
	                 0 0 5px rgba(0,0,0,.05),
	                0 1px 3px rgba(0,0,0,.2),
	                0 3px 5px rgba(0,0,0,.2),
	               0 5px 10px rgba(0,0,0,.2),
	              0 10px 10px rgba(0,0,0,.2),
	              0 20px 20px rgba(0,0,0,.3);
                 

            }
             */

        /*
            .class3d:before {
              
                    content: attr(data-text);
                    position: absolute;
                    overflow: hidden;
                    max-width: 7em;
                    white-space: nowrap;
                    color: #fff;
                    animation: class3d 8s linear;
                }
                @keyframes class3d {
                    0% {
                        max-width: 0;
                    }
                }
                */

        /*
                .classLatest {
                    color: grey;
                }
                */

        .center {
            text-align: center;
        }

        .fun {
            font-size: 50px;
            color: rgba(255, 255, 255, .2);
            /*
            background-image: url('https://images.unsplash.com/photo-1529641484336-ef35148bab06?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=55a1e60cd6799d5761c7ec40c4954569&auto=format&fit=crop&w=500&q=60');
            */
            background-image: url('https://prorepairch.com/wp-content/uploads/2021/09/cropped-cropped-Logo-2048x1733.png');
            /*   background-position: center; */
            background-size: 270px;
            background-repeat: repeat-x;
            -webkit-background-clip: text;
            animation: animate 15s linear infinite;
        }

        @keyframes animate {
            0% {
                background-position: left 0px top 0px;
            }

            40% {
                background-position: left 800px top 0px;
            }
        }



        /* Vote */
        /**
        Responsive Code
        */
        @media only screen and (max-width: 600px) {
            .btn-area {
                text-align: center;
                overflow: hidden;
                margin: 10px 10px 8px 10px;
            }

            .btn-area a {
                display: block;
            }

            .prorepairch {
                font-size: 48px;
                color: #0756ff;
            }
        }
    </style>


</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="logo">
                        <a href="index.php">
                            <picture>
                                <img src="images/logo-small.webp" width="100" alt="Logo">
                            </picture>
                        </a>
                        <span class="py-3"><?php echo date('Y-m-d H:m:i'); ?></span>
                        <span><?php echo $_SESSION['name']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>