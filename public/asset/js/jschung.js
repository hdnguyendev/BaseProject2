
for (let i = 1; i <= 4; i++) {
    $(`#nav-tag-sm-${i}`).on('click', function(){
        $(`#nav-tag-content-sm-${i}`).toggle();
        $(`#nav-tag-sm-${i}`).toggleClass('fa-plus');
        $(`#nav-tag-sm-${i}`).toggleClass('fa-minus');
    
    })
}
setTimeout(() => {
    $('#header-search-form').addClass('hidden')
    $('#login-direct').addClass('hidden')
    
}, -1000);

$('#header-search').click(()=>{
    $('#header-search-form').click(e=>{
        e.stopPropagation();
    })
    $('#header-search-form').toggleClass('hidden')
    
})
$('#show-nav-sm').click(()=>{
    $('#nav-sm').click(e=>{
        e.stopPropagation();
    })
    $('#nav-sm').toggleClass('hidden')
})
$(document).mouseup(function(e) 
{
    var container = $("#header-search-form");
    var contain = $('#header-search');
    if ((!container.is(e.target) && container.has(e.target).length === 0) &&(!contain.is(e.target) && contain.has(e.target).length === 0) ) 
    {
        container.addClass('hidden');
    }
});
$(document).mouseup(function(e) 
{
    var container = $('#nav-sm');
    var contain = $('#show-nav-sm');
    if ((!container.is(e.target) && container.has(e.target).length === 0) &&(!contain.is(e.target) && contain.has(e.target).length === 0) ) 
    {
        container.addClass('hidden');
    }
});

$('#login').click(()=>{
    $('#login-direct').click(e=>{
        e.stopPropagation();
    })
    $('#login-direct').toggleClass('hidden')
})
$(document).mouseup(function(e) 
{
    var container = $("#login-direct");
    var contain = $('#login');
    if ((!container.is(e.target) && container.has(e.target).length === 0) &&(!contain.is(e.target) && contain.has(e.target).length === 0) ) 
    {
        container.addClass('hidden');
    }
});

(function renderType(){
    const api = `https://ophim1.com/the-loai`
    const types = $('#type-film')
    const typeMb = $('#type-film-mobile')
    fetch(api)
        .then(res => res.json())
        .then(data =>{
            data.forEach(type => {
                const typeName = type['name']
                const liTag = document.createElement('li')
                const aTag = document.createElement('a')
                aTag.innerText=typeName
                aTag.setAttribute('href', `${window.location.origin}/type/${type['slug']}`)
                liTag.append(aTag)
                types.append(liTag)
                typeMb.append(liTag.cloneNode(true))
            });
        
        })


    })()


