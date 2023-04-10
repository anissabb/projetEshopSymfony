
const stars=document.querySelectorAll('.stars a');
stars.forEach((star,indexClique)=>{
  star.addEventListener('click',()=>{

        //mettre les étoiles en "couleurs"
        stars.forEach((autreEtoile,autreIndex)=>{
            if(autreIndex<=indexClique){
                autreEtoile.classList.add("active");
            }
          
        });
      console.log(`l'étoile de l'index ${indexClique+1} a ete cliquée`);

  });
});

