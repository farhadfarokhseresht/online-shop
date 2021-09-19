
// $('#addproduct').on('click',function () {
//     var allInputs = $( ":input" );
//     alert(allInputs[0])
//     var formChildren = $( "form > *" );
//     $( "#messages" ).text( "Found " + allInputs.length + " inputs and the form has " +
//         formChildren.length + " children." );
//     $( "form" ).submit(function( event ) {
//         event.preventDefault();
//     });
// })
//















//--------------------------------------
function addnewcat() {
    $('#productcat').remove();
    $('#admin_add_cat_bu').remove();
    $('#categoripart').append('<input type="text" class="form-control" placeholder="نام دسته جدید" />')
}

function addnewbrand() {
    $('#productbrand').remove();
    $('#admin_add_brand_bu').remove();
    $('#brandpart').append('<input type="text" class="form-control" placeholder="نام برند جدید" />')
}

$('#addimg').on('click', add);
$('#removeimg').on('click', remove);

function add() {
    var new_chq_no = parseInt($('#total_chq').val()) + 1;
    var new_input = "<input required accept='image/*'  type='file' class='form-control form-control-sm' id='new_" + new_chq_no + "'>";
    $('#new_chq').append(new_input);

    $('#total_chq').val(new_chq_no);
}

function remove() {
    var last_chq_no = $('#total_chq').val();

    if (last_chq_no > 0) {
        $('#new_' + last_chq_no).remove();
        $('#total_chq').val(last_chq_no - 1);
    }
}

$('#addcolor').on('click', addcolor);
$('#removecolor').on('click', removecolor);

function addcolor() {
    var new_chq_no = parseInt($('#total_chq_color').val()) + 1;
    var new_input = "<input type='color' class='form-control form-control-color' id='new_color" + new_chq_no + "'>";
    $('#new_chq_color').append(new_input);

    $('#total_chq_color').val(new_chq_no);
}

function removecolor() {
    var last_chq_no = $('#total_chq_color').val();

    if (last_chq_no > 0) {
        $('#new_color' + last_chq_no).remove();
        $('#total_chq_color').val(last_chq_no - 1);
    }
}

$('#addFeature').on('click', addFeature);
$('#removeFeature').on('click', removeFeature);

function addFeature() {
    var new_chq_no = parseInt($('#total_chq_Feature').val()) + 1;
    // var new_input = "<input required accept='image/*'  type='file' class='form-control form-control-sm' id='new_Feature" + new_chq_no + "'>";
    // $('#new_chq_Feature').append(new_input);
    var itm = document.getElementById("newfeature");
    var cln = itm.cloneNode(true);
    cln.setAttribute("id", "newfeature" + new_chq_no)
    document.getElementById("new_chq_Feature").appendChild(cln);
    $('#total_chq_Feature').val(new_chq_no);
}

function removeFeature() {
    var last_chq_no = $('#total_chq_Feature').val();

    if (last_chq_no > 1) {
        $('#newfeature' + last_chq_no).remove();
        $('#total_chq_Feature').val(last_chq_no - 1);
    }
}

