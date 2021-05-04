var isNew = true;
    getProductcode();

    function getProductcode()
    {
      $("#product_code").keyup(function(e){

        $.ajax({
            type: "POST",
            url: 'getProduct.php',
            dataType: "JSON",
            data: {product_code:$("#product_code").val()},

            success: function(data)
            {
                console.log(data);

                $("#product_name").val(data[0].product_name);
                $("#unit_price").val(data[0].unit_price);
                $("#quantity").focus();

            },

            error: function(data)
            {
                console.log(data)
            }

        });
        
      });
    
    }
    
    $(function(){

        $("#unit_price, #quantity").on("keydown keyup click",quantity);

        function quantity()
        {
            var sum = +$("#unit_price").val() * +$("#quantity").val();
            $("#amount").val(sum);
        }

    })
    
    function addProduct()
    {
        var product = {
            product_code: $("#product_code").val(),
            product_name: $("#product_name").val(),
            unit_price: $("#unit_price").val(),
            quantity: $("#quantity").val(),
            amount: $("#amount").val(),
        };
        addRow(product);
        $("#productForm") [0].reset();
    }
 
    var total = 0;
    function addRow(product)
    {
        if($('#product_code').val().length==0)
        {
            $.alert({
                title: 'Error',
                content: "Please Enter the Product Code",
                type: 'red',
                autoclose: 'ok|2000',
            });
        }
        else{

        var $tableB = $("#productlist tbody");
        var $row = $(
            "<tr>" + 
            "<td><button class='btn' type='button' onclick='deleteRow(this)'>Delete</button></td>" +
            "<td>" + product.product_code + "</td>" +
            "<td>" + product.product_name + "</td>" +
            "<td>" + product.unit_price + "</td>" +
            "<td>" + product.quantity + "</td>" +
            "<td>" + product.amount + "</td>" +
            "</tr>" 
        );
        $row.data("product_code",product.product_code);
        $row.data("product_name",product.product_name);
        $row.data("unit_price",product.unit_price);
        $row.data("quantity",product.quantity);
        $row.data("amount",product.amount);

        $tableB.append($row);
        total += Number(product.amount);
        $('#total').val(total);
        }
    }
    var product_total;
    function deleteRow(e)
    {
        product_total = parseInt($(e).parent().parent().find('td:last').text(),10);
        total -= product_total;
        $('#total').val(total);
        $(e).parent().parent().remove();
    }

    $(function(){

        $("#total, #pay").on("keydown keyup",total);

        function total()
        {
            var sum =  +$("#pay").val() - +$("#total").val();
            $("#due").val(sum);
        }

    })
    
    function addInvoice()
    {
        var table_data = [];

        $('#productlist tbody tr').each(function(row,tr)
        {
            var sub = {
                'product_code': $(tr).find('td:eq(1)').text(),
                'product_name': $(tr).find('td:eq(2)').text(),
                'unit_price': $(tr).find('td:eq(3)').text(),
                'quantity': $(tr).find('td:eq(4)').text(),
                'amount': $(tr).find('td:eq(5)').text(),
            };
            table_data.push(sub);
        });           

        $.ajax({
            type: "POST",
            url: "addPurchase.php",
            dataType: "JSON",
            data: {total:$("#total").val(), pay:$("#pay").val(), due:$("#due").val(), payment_type:$("#payment_type").val(), data: table_data},

            success: function(data)
            {
                var msg;
                if(isNew)
                {
                    msg = "Purchase Completed";
                }

                $.alert({
                title: 'Success',
                content: msg,
                type: 'Green',
                autoclose: 'ok|2000',
                });

            last_id = data.last_id;

            window.location = "print.php?last_id=" + last_id;         

            },

            error: function (xhr,status,error)
            {
                console.log(xhr.responseText);
            },

        });

    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
}