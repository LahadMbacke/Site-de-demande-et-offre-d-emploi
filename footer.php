 <style type="text/css">
   /* Styles related to footer */
/*button{
    padding: 0.8em; 
    color: #fff; 
    border: none; 
    outline: none; 
    font-size: 1.2rem;
    font-family: 'Josefin sans', ;
    background-color: hsl(143, 93%, 39%);
    cursor: pointer;
    margin-top: 1em; 
}*/
/*button:first-of-type:hover{
    background-color: hsl(143, 98%, 30%);
}
button:last-of-type{
    background-color: hsl(204, 93%, 39%) ;
}
button:last-of-type:hover{
    background-color: hsl(204, 98%, 30%) ;
}*/

/*button+button{
    margin-left: 2rem; 
}*/
/*main{
    width: 60%;
    margin: 2em auto; 
    line-height: 1.8;
    outline: 1px solid #c2c2c2;
    padding: 2em; 
}*/
footer p{
    padding:0;
    font-size: 0.8em;
    color: hsla(0, 50%, 100%, 0.35);
    margin: 1em 0;
    font-size: 1rem;
}
footer ul{
    list-style: none;
    display: flex;
    margin: 1em 0; 
}
footer ul li a{
    padding: 1em; 
    text-decoration: none;
    color: rgba(255, 255, 255, 0.904);
    transition: 100ms;
}
footer ul li a:hover{
    color: var(--primary);
}

footer{
    width: 100%;
    background: #01120D;
    color: #fff; 
    display: grid;
    place-items: center;
    padding: 2em; 
    font-size: 1.2rem;
}



/* Sticky Footer Styling */
body{
    min-height: 100vh;
}
.sticky-footer{
    position: sticky;
    top: 100%;
}

 </style>

 <footer class="sticky-footer">
        <!-- <h2>Footer Stick to the Bottom</h2> -->
        <ul>
            <li><a href="principale.php">Accueil</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <p> © Copyright BLM 2021.</p>

    </footer>