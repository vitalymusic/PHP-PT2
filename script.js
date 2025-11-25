$(document).ready(()=>{
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
                    <img src="${item.url}" alt="${item.id}">
                    <h6>${item.name}</h6>
                </div>
               
               `; 
        })
        $('.gallery').html(html);
    })






})