var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {
        myIndex = 1
    }
    x[myIndex - 1].style.display = "block";
    setTimeout(carousel, 6000);
}


// $(function () {
//     $("form").validate({
//         rules: {
//             ho_ten: { 
//    ???
//     , 
//    ???
//     },
//     },
//     messages: {
//     ho_ten: {
//         required: 'Không để trống họ và tên',
//         maxlength: 'Họ tên không vượt quá 20 ký tự'
//     }
// }
//     });
//    });

