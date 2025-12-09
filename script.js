$(document).ready(()=>{
   



    // navigācija

    $.get('http://localhost/php-pt2/functions.php?action=showMenu', resp=>{resp})
    .then((menu)=>{
        menu  = JSON.parse(menu);
        menu.forEach((item)=>{
            $('ul.navbar-nav').append(`
                  <li class="nav-item">
                        <a href="functions.php?action=showSection&page=${item.page_seo_url}" data-page="${item.page_seo_url}" class="nav-link">${item.page_name}</a>
                   </li>  
            `);
        })

    })
    .then(()=>{
        $('ul.navbar-nav a').on("click", (e)=>{
            e.preventDefault();
            // window.preventDefault();
            window.location.hash = e.target.dataset.page;
            // history.pushState({}, '', e.target.dataset.page);
            $.get(e.target.href,(resp)=>{resp})
                .then((html)=>{
                      html = JSON.parse(html);
                      $('.html_content').html(html);
                })
        })

    }).then(()=>{
        $('ul.navbar-nav a')[0].click();
    })

})


function gallery(){

     let data = [];
    $.get('http://localhost/php-pt2/functions.php?action=showImages',(resp)=>{
        data = JSON.parse(resp);
        return data;
    }).then(()=>{
        console.log(data);
        let html = "";
        data.forEach((item)=>{
               html += `
                <div class="picture">
                    <a href="${item.url}" data-lightbox="images" data-title="${item.name}">
                        <img src="${item.url}" alt="${item.name}">
                    </a>
                    <h6>${item.name}</h6>
                </div>
               `; 
        })
        $('.gallery').html(html);
    })
}