$(document).ready(function() {

    $.ajax({

        url: '../include/item_select.php',
        method: 'GET',
        datatype: 'json'
    }).done(function(data){
        
        data = $.parseJSON(data);
    });

    //displayRecord();
     
    //fetching   
    // function displayRecord() {

    //     $.ajax({

    //         url: "../include/item_select.php",
    //         method: "get",
            
    //         success: function(response) {
                
    //             var res= JSON.parse(response);

    //             var output = "";
                    
    //             res.forEach(row => {
    //                 output += 
    //                     `<tr>
    //                         <td>${row.Item_ID}</td>
    //                         <td>${row.Item_Name}</td>
    //                         <td>${row.Item_Description}</td>
    //                         <td>${row.Item_Price}</td>
    //                         <td>
    //                             <img src='${row.Item_Image}' width='90px' class='img-thumbnail'>
    //                         </td>
    //                         <td>
    //                             <a href='../admin/updateItem.php?id=${row.Item_ID}' class='btn btn-outline-success'>Update</a>

    //                             <a href='../include/item_delete.php?id=${row.Item_ID}' class='btn btn-outline-danger'>Delete</a>
    //                         </td>
    //                     </tr>`;
    //             });

    //             $("#myData").html(output);
                    
    //         }

    //     });
    // }


     // <a href='#?id=${row.Item_ID}' class='btn btn-outline-success' id="delete">Delete</a>

    $("#myForm").on('submit', function(e){

        e.preventDefault();

        $.ajax({

            url: "../include/item_add.php",
            method: "post",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                //$("#result").html(data);
                alert(data);
            }

        });
    });


    $("#updateForm").on('submit', function(e){

        e.preventDefault();

        $.ajax({

            url: "../include/item_update.php",
            method: "post",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                //$("#result").html(data);
                alert(data);
            }

        });
    });

    //deleting
    // $("#delete").click(function(e) {

    //     e.preventDefault();

    //     var id= id;

    //     $.ajax({

    //         url: "../include/item_delete.php",
    //         method: "get",
    //         data: {id: id},
    //         success: function(data) {
    //             $("#result").html(data);
    //             alert(data);
    //         }

    //     });

    // });

    // $("#submitDelete").click(function(e) {

    //     alert("HELOOOOO");
        // var id= $_GET['id'];

        // alert(id);

        // $.ajax({

        //     type: "POST",
        //     url: "../include/item_delete.php",
        //     data: {id: id},
        //     success: function(data) {
        //         //alert("successfully deleted");
        //     }
        // });

    //});



});