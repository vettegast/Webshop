function myFunction() {
    var element = document.getElementById("topnav");
    element.classList.toggle("unset");
}

function show(item){
            if (item === 'product') {
                document.getElementById('formProduct').style.display = 'flex';
                document.getElementById('formCategory').style.display = 'none';
                document.getElementById('formStock').style.display = 'none';
                document.getElementById('formOrders').style.display = 'none';

                document.getElementById('listProduct').style.backgroundColor = '#FFC815';
                document.getElementById('listCategory').style.backgroundColor = 'white';
                document.getElementById('listStock').style.backgroundColor = 'white';
                document.getElementById('listOrders').style.backgroundColor = 'white';
            } else if (item === 'category') {
                document.getElementById('formProduct').style.display = 'none';
                document.getElementById('formCategory').style.display = 'block';
                document.getElementById('formStock').style.display = 'none';
                document.getElementById('formOrders').style.display = 'none';

                document.getElementById('listProduct').style.backgroundColor = 'white';
                document.getElementById('listCategory').style.backgroundColor = '#FFC815';
                document.getElementById('listStock').style.backgroundColor = 'white';
                document.getElementById('listOrders').style.backgroundColor = 'white';
            } else if (item === 'stock') {
                document.getElementById('formProduct').style.display = 'none';
                document.getElementById('formCategory').style.display = 'none';
                document.getElementById('formStock').style.display = 'block';
                document.getElementById('formOrders').style.display = 'none';

                document.getElementById('listProduct').style.backgroundColor = 'white';
                document.getElementById('listCategory').style.backgroundColor = 'white';
                document.getElementById('listStock').style.backgroundColor = '#FFC815';
                document.getElementById('listOrders').style.backgroundColor = 'white';
            } else if (item === 'orders') {
                document.getElementById('formProduct').style.display = 'none';
                document.getElementById('formCategory').style.display = 'none';
                document.getElementById('formStock').style.display = 'none';
                document.getElementById('formOrders').style.display = 'block';

                document.getElementById('listProduct').style.backgroundColor = 'white';
                document.getElementById('listCategory').style.backgroundColor = 'white';
                document.getElementById('listStock').style.backgroundColor = 'white';
                document.getElementById('listOrders').style.backgroundColor = '#FFC815';
    }
}