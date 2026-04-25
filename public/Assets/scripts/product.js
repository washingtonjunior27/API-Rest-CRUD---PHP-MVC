const formCreateProduct = document.getElementById('form-create-product');

if(formCreateProduct){
    formCreateProduct.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(e.target);

        const response = await fetch('api-product/create' ,{
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        if(result.success){
            const alertHtml = `
            <div class="alert alert-success" role="alert">
                ${result.message}
            </div>
            `;
            document.getElementById('alert-container-new-product').innerHTML = alertHtml;
            setTimeout(() => {
                window.location.href = 'home';
            }, 3000);
        }else{
            const alertHtml = `
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                ${result.message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `;
            document.getElementById('alert-container-new-product').innerHTML = alertHtml;
        }
    })
}

let currentPage = 1;

document.addEventListener('DOMContentLoaded', () => {
    loadProducts();

    let searchInputProd = document.getElementById('searchInputProd');
    // Busca em tempo real
    if(searchInputProd){
        searchInputProd.addEventListener('input', (e) => {
            currentPage = 1;
            loadProducts(currentPage, e.target.value);
        })
    }
})

async function loadProducts(page = 1, search = ''){
    const response = await fetch(`api-product/read?page=${page}&search=${search}`);

    const result = await response.json();

    if(result.success){
        renderProducts(result.products);
    }
}

function renderProducts(products){
    const tableProducts = document.getElementById('product-itens-table');

     tableProducts.innerHTML = products.length ? '' :
        `
            <tr>
                <td colspan='6' class='text-center'>
                Nenhum produto encontrado
                </td>
            </tr>
        `;
    
        products.forEach((prod) => {
            tableProducts.innerHTML += `
                    <tr>
                        <th scope="row">${prod.id_product}</th>
                        <td>
                            <img src="public/Assets/img/${prod.image_product}" class="rounded img-product">
                        </td>
                        <td>${prod.name_product}</td>
                        <td>${prod.price_product}</td>
                        <td>${prod.brand_product}</td>
                        <td>
                            <a href="" class="btn btn-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button class="btn btn-danger">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </td>
                    </tr>
            `
        })
    
}