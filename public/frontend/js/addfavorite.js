
        const likeContent = document.querySelector('#like-content');
        
        document.querySelectorAll(".heartFavorite").forEach(
        ele => ele.addEventListener("click",

          function(e){
           if(e.target.classList.contains('addfavorite')){
            e.target.parentElement.classList.add('d-none')
            e.target.parentElement.parentElement.querySelector('.favorited').classList.remove('d-none')
            e.target.parentElement.classList.add('d-none')
            e.target.parentElement.parentElement.querySelector('.favorited').classList.remove('d-none')
            document.querySelector('.likes .like-secondary-icon').classList.add('d-none')
            document.querySelector('.likes .like-red-icon').classList.remove('d-none')
            document.querySelector('#headingTwo .like-secondary-icon2').classList.add('d-none')
            document.querySelector('#headingTwo .like-red-icon2').classList.remove('d-none')
            const houseInfo = e.target.parentElement.parentElement.parentElement.parentElement
            getInfo(houseInfo)

            }}

        )
    );
    
    document.querySelectorAll(".heartFavorite").forEach(
        ele => ele.addEventListener("click",

          function(e){
           if(e.target.classList.contains('removefavorite')){
               
            e.target.parentElement.classList.add('d-none')
            e.target.parentElement.previousElementSibling.classList.remove('d-none')
            const id =  e.target.getAttribute('data-id')
            removels(id);
               document.querySelectorAll(".likes .like-hover").forEach(
                    function(e){
                      if(e.getAttribute('data-id') == id){
                          e.remove()
                          const numberElement = document.querySelectorAll('.like-hover')
                           if(numberElement.length == 0){
                              const noLiked = document.querySelector('.likes #like-content .no-liked')
                              noLiked.classList.remove('d-none')
                           }

                        }
                   }
                   )

            }}

        )
    );
    
    document.querySelectorAll(".likes").forEach(
        ele => ele.addEventListener("click",

          function(e){
              e.preventDefault()
           if(e.target.classList.contains('remove-like')){
               e.target.parentElement.remove()
               const removeKey = e.target.getAttribute('data-id')
                document.querySelectorAll(".heartFavorite .removefavorite").forEach(
                    function(e){
                        if(e.getAttribute('data-id') == removeKey){
                         e.parentElement.classList.add('d-none')
                         e.parentElement.previousElementSibling.classList.remove('d-none')
                        }
                    }
                   )
               removels(removeKey)
               const numberElement = document.querySelectorAll('.like-hover')
             
               if(numberElement.length == 0){
                  const noLiked = document.querySelector('.likes #like-content .no-liked')
                  noLiked.classList.remove('d-none')
               }
            }
              
          }

        )
    );
    
    function getInfo(info){
        const house ={
            image: info.querySelector('figure img').src,
            name: info.querySelector('.lower-content .lower-content-text h5').textContent,
            price: info.querySelector('#slug .house__price').textContent,
            slug: info.querySelector('.course__header a').getAttribute('href'),
            id: info.querySelector('.addfavorite').getAttribute('data-id'),
            city:info.querySelector('.lower-content .lower-content-text .lucation').textContent,
            room:info.querySelector('.lower-content .lower-content-text ul .room-number').textContent,
            bath:info.querySelector('.lower-content .lower-content-text ul .bathroom-number').textContent,
            feature: info.querySelector('.course__header .feature-house').textContent,

        }
         addToLike(house)
         saveLS(house)
    }
    function addToLike(houseinfo){
        let anchor = document.createElement('a')
        anchor.className = "like-hover d-flex justify-content-start text-dark nav-links text-center  py-3"
        anchor.style.margin = 0
        anchor.href = houseinfo.slug
        anchor.setAttribute('data-id',houseinfo.id)
        anchor.innerHTML = `
               <div class="col-10" style="display:flex;justify-content:space-between;">
                    <img  src="${houseinfo.image}">
                    <div class=" mr-2 " style="display:flex;justify-content:center;flex-direction:column;">
                        <span>${houseinfo.name}</span>
                        <span class="text-danger font-weight-bold">${houseinfo.price}</span>
                    </div>
                </div>
                    <a  type="button" class="remove-like  p-3" style="left:0%;top:0%;z-index:2000;font-size:30px;border-radius:50%;" aria-hidden="true" data-id="${houseinfo.id}">&times;</a>

             `
        const noLiked = document.querySelector('.likes #like-content .no-liked')
        if(noLiked){
           noLiked.classList.add('d-none')
        }
        likeContent.appendChild(anchor)

    }
    function readLS(){
        let favoriteHouse;
        if (localStorage.getItem('favoriteHouse')) {
            favoriteHouse = JSON.parse(localStorage.getItem('favoriteHouse'))
        } else {
            favoriteHouse =[]
        }
        return favoriteHouse
    }
    
    function saveLS(home){

        let favoriteHouse = readLS();
        favoriteHouse.push(home)
        localStorage.setItem('favoriteHouse',JSON.stringify(favoriteHouse))


    }
        function showOnLoads(){
        let favoriteHouses =  readLS();
             if(favoriteHouses.length > 0){
                document.querySelector('.likes .like-secondary-icon').classList.add('d-none')
                document.querySelector('.likes .like-red-icon').classList.remove('d-none')
                document.querySelector('#headingTwo .like-secondary-icon2').classList.add('d-none')
                document.querySelector('#headingTwo .like-red-icon2').classList.remove('d-none')
            }
        favoriteHouses.forEach(function(house){
            let anchor = document.createElement('a')
            anchor.className = "like-hover d-flex justify-content-start text-dark nav-links text-center  py-3"
            anchor.style.margin = 0
            anchor.href = house.slug
            anchor.setAttribute('data-id',house.id)
            anchor.innerHTML = `

               <div class="col-10" style="display:flex;justify-content:space-between;">
          
                    <img  src="${house.image}">
                    <div class=" mr-2 " style="display:flex;justify-content:center;flex-direction:column;">
                        <span>${house.name}</span>
                        <span class="text-danger font-weight-bold">${house.price}</span>
                        
                    </div>
                    </div>
                      <a type="button" class="remove-like p-3 " style="left:0%;top:0%;z-index:2000;font-size:30px;border-radius:50%;" aria-hidden="true" data-id="${house.id}">&times;</a>
             ` 
        
        document.querySelectorAll(".addfavorite").forEach(
            function(e){

                favoriteHouses.forEach(
                    function(favorite,index){
                        if(e.getAttribute('data-id') === favorite.id){
                            e.parentElement.classList.add('d-none')
                            e.parentElement.parentElement.querySelector('.favorited').classList.remove('d-none')
                        }
                    }
                )
            }
        )
        const noLiked = document.querySelector('.likes #like-content .no-liked')
            if(noLiked){
                 noLiked.classList.add('d-none')
            } 
            likeContent.appendChild(anchor)
        })
        document.querySelectorAll(".addfavorite").forEach(
            function(e){

                favoriteHouses.forEach(
                    function(favorite,index){
                        if(e.getAttribute('data-id') === favorite.id){
                            e.parentElement.classList.add('d-none')
                            e.parentElement.parentElement.querySelector('.favorited').classList.remove('d-none')
                        }
                    }
                )
            }
        )

      }
    function removels(id){
        let houseLS = readLS()

        houseLS.forEach(function(house , index){
            if(house.id === id){
                houseLS.splice(index , 1)
            }
        });

      localStorage.setItem('favoriteHouse', JSON.stringify(houseLS))
          if(houseLS.length == 0){
                document.querySelector('.likes .like-secondary-icon').classList.remove('d-none')
                document.querySelector('.likes .like-red-icon').classList.add('d-none')
                document.querySelector('#headingTwo .like-secondary-icon2').classList.remove('d-none')
                document.querySelector('#headingTwo .like-red-icon2').classList.add('d-none')
            }
    }
    showOnLoads()

