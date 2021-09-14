<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>

	<link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" type="text/css" href="css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="undefined" crossorigin="anonymous">

</head>
<style type="text/css">




    .containerdashs{
        position: fixed;
        margin-left: 0%;
        padding-left: 0px;
        width: 100%;
       
    }
    .containerdashs {
        overflow-x: hidden;
        overflow-y: scroll;
        color: red;
    }

    body{
        overflow: hidden;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
        width: 100%;

    }

    .navigation{
        position: fixed;
        height: 100%;
        background:#3090C7;
        width: 20%;
        transition: 0.5%;
        margin-left: -2%;
        overflow-x: hidden;
        overflow-y: scroll;



    }
     .navigation::-webkit-scrollbar{
        width: 20px;
    }
    

    .navigation ul{
        list-style-type: none;
        position: relative;
        top: 0;
        left: 0;
        width: 100%;

    }

    .navigation ul li{
        list-style: none;
        position: relative;
        top: 0;
        right: 5%;
        width: 100%;


    }

    .navigation ul li a{
        color: white;
        text-decoration: none;
        position: relative;
        display: block;
        width: 100%;
        display: flex; 
        margin-left: 5%;

        
    }


    .title{
       
        position: relative;
        display: block;
        padding:  0 10px;
        line-height: 0px;
        height: 20px;
        white-space: normal;
        color: black;
        margin-left: 15px;
    }
     
     .navigation ul li:hover{
        background: #03a9f4;
     }
      
      .navigation ul li:nth-child(1){
        margin-bottom: 20px;
      }
     .navigation ul li:nth-child(1):hover{
        background: transparent;
     }

     .navigation ul li a .title{

        position: relative;
        display: block;
        
        line-height: 0px;
        height: 20px;
        white-space: nowrap;
       
        

     }
  
     .titles{
        color: gold;
        margin: 6px;
        width: 10%;
        

     }
     .icons{
        color: black;
        margin-left: 0px;

     }
    

     span .icon{
        background: transparent url();
     }

     .icon {
            position: relative;
            / * Adjust these values accordingly */
            top: 0px;
            left: 0px;
            margin-left: 0px;
            color: black;
            top: 12px;
            left: 5px;

           }


   .navigation ul li span .icon{

        position: relative;
        line-height: 0px;
        height: 20px;
        color: black;
        padding-right: 35px;
        

     }

    
</style>
<body>
      <div class="containerdashs">
       <div class="navigation">
           <ul class="scrollbar">

           <li>
               <span class="icons"><i class="fas fa-hospital-symbol"></i></span>
               <span class="titles">Classic Care Clinic</span> 
           </li>
          

           <li>
               
               <span class="icon"><i class="fas fa-desktop"></i></span>
               <span class="title"><a href="administration.php">Dashboard</a></span> 
           </li> 


           <li>
               
               <span class="icon"><i class="fas fa-chart-line"></i></span>
               <span class="title"><a href="profile.php">Profile</a></span> 
           </li> 
           <li>
               
               <span class="icon"><i class="fas fa-chart-line"></i></span>
               <span class="title"><a href="admin.php">Administrators</a></span> 
           </li>

            <li>
               <span class="icon"><i class="fas fa-user-md"></i></span>
               <span class="title"><a href="doctor.php">Doctors</a></span> 
           </li>

            <li>
               <span class="icon"><i class="fas fa-procedures"></i></span>
               <span class="title"><a href="./patient.php">Patient</a></span> 
           </li>

            <li>
               <span class="icon"><i class="fas fa-car-crash"></i></span>
               <span class="title"><a href="#">Insurance</a></span> 
           </li>

            <li>
               <span class="icon"><i class="fas fa-toolbox"></i></span>
               <span class="title"><a href="#">Equipments</a></span> 
           </li> 

            <li>
               <span class="icon"><i class="fas fa-laptop-medical"></i></span>
               <span class="title"><a href="#">Pharmacy</a></span> 
           </li>

            <li>
               <span class="icon"><i class="fas fa-dollar-sign"></i></span>
               <span class="title"><a href="#">Accounts</a></span> 
           </li>

            <li>
               <span class="icon"><i class="fas fa-share-alt"></i></span>
               <span class="title"><a href="#">Shares</a></span> 
           </li>

            <li>
            
               <span class="icon"><i class="fas fa-cog"></i></span>
               <span class="title"><a href="#">Settings</a></span> 
           </li>
            <li>
            
               <span class="icon"><i class="fas fa-cog"></i></span>
               <span class="title"><a href="#">Settings</a></span> 
           </li>
            <li>
            
               <span class="icon"><i class="fas fa-cog"></i></span>
               <span class="title"><a href="#">Settings</a></span> 
           </li>
            <li>
            
               <span class="icon"><i class="fas fa-cog"></i></span>
               <span class="title"><a href="#">Settings</a></span> 
           </li>
            <li>
            
               <span class="icon"><i class="fas fa-cog"></i></span>
               <span class="title"><a href="#">Settings</a></span> 
           </li>

           </ul>
       </div> 

    </div>
</body>
</html>