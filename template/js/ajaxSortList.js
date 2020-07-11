$(document).ready(function()    {

    let sort = $('#sort');
    let color = $('#color');

    console.log(sort);

    $.ajax({
        method: 'POST',
        url: '/product/list/',
        data: {filter: sort, color: color},
        cache: false,
        success: function(data)  {
            let success = JSON.parse(data);
        }
    });

    sort.on('change', function()    {
        let sort = $('#sort');
        $.ajax({
            method: 'POST',
            url: '/product/list/',
            data: {filter: sort, color: color},
            cache: false,
            success: function(data)  {
                let success = JSON.parse(data);
            }
        });
    })
    
    color.on('change', function()    {
        let color = $('#color');
        $.ajax({
            method: 'POST',
            url: '/product/list/',
            data: {filter: sort, color: color},
            cache: false,
            success: function(data)  {
                let success = JSON.parse(data);
            }
        });
    })
})