export function hello(){
    console.log('The festival_nb34 JavaScript works! 🙂');
}

$('#theme li').click(function () {
    //alert('item: ' + $(this).text());
    switch_style($(this).text());
});

Noty.overrideDefaults({
    layout: 'topRight',
    theme: 'bootstrap-v4',
    timeout: 3000
});

$('body').tooltip({
    selector: '[data-toggle="tooltip"]',
    html : true,
});

