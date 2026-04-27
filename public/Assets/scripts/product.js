const formCreateProduct = document.getElementById('form-create-product');
const formUpdateProduct = document.getElementById('form-update-product');

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
            }, 2000);
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

if(formUpdateProduct){
    formUpdateProduct.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(e.target);

        const response = await fetch('api-product/update' ,{
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
            document.getElementById('alert-container-update-product').innerHTML = alertHtml;
            setTimeout(() => {
                window.location.href = 'home';
            }, 2000);
        }else{
            const alertHtml = `
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                ${result.message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `;
            document.getElementById('alert-container-update-product').innerHTML = alertHtml;
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
        renderPagination(result.pagination);
    }
}

function renderProducts(products){
    const tableProducts = document.getElementById('product-itens-table');

    tableProducts.innerHTML = '';

    if(products.length === 0){
        tableProducts.innerHTML =
        `
            <tr>
                <td colspan='6' class='text-center'>
                Nenhum produto encontrado
                </td>
            </tr>
        `;
    }
        
    products.forEach((prod) => {
        tableProducts.innerHTML += `
                <tr>
                    <th scope="row">${prod.id_product}</th>
                    <td>
                        <img src="public/Assets/img/${prod.image_product}" class="rounded img-product">
                    </td>
                    <td>${prod.name_product}</td>
                    <td>R$${prod.price_product}</td>
                    <td>${prod.brand_product}</td>
                    <td>
                        <a href="editProduct?id_product=${prod.id_product}" class="btn btn-warning">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-delete-trigger" 
                                data-id="${prod.id_product}" 
                                data-name="${prod.name_product}"
                                data-bs-toggle="modal" 
                                data-bs-target="#deleteProductModal">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </td>
                </tr>
        `
    })
}

const deleteProdModal = document.getElementById('deleteProductModal');
const deleteProdForm = document.getElementById('delete-form-product');

if(deleteProdModal){
    deleteProdModal.addEventListener('show.bs.modal', function (e){
        const button = e.relatedTarget;

        const id_product = button.getAttribute('data-id');
        const name_product = button.getAttribute('data-name');

        document.getElementById('delete-product-name').innerHTML = name_product;
        document.getElementById('delete-product-id').value = id_product;
    })
}

if(deleteProdForm){
    deleteProdForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const id = document.getElementById('delete-product-id').value;

        const response = await fetch(`api-product/delete?id=${id}`, {
            method:'DELETE'
        });

        const result = await response.json();

        if(result.success){
            const modalInstance = bootstrap.Modal.getInstance(deleteProdModal) || new bootstrap.Modal(deleteProdModal);
            modalInstance.hide();

            const alertHtml = `
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                ${result.message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `;
            document.getElementById('alert-container-list-product').innerHTML = alertHtml;
            loadProducts();
        }else{
            const alertHtml = `
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                ${result.message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `;
            document.getElementById('alert-container-delete-product').innerHTML = alertHtml;
        }
    })
}

function renderPagination(pagination) {
    const container = document.getElementById('pagination-container');
    container.innerHTML = '';

    const currentPage = parseInt(pagination.currentPage);
    const totalPages = parseInt(pagination.totalPages);

    if (totalPages <= 1) return;

    const maxVisibleButtons = 2; 

    const prevDisabled = currentPage === 1 ? 'disabled' : '';
    container.innerHTML += `
        <li class="page-item ${prevDisabled}">
            <button class="page-link" onclick="changePage(${currentPage - 1})">
                <i class="bi bi-chevron-left"></i>
            </button>
        </li>
    `;

    let startPage = Math.max(1, currentPage - maxVisibleButtons);
    let endPage = Math.min(totalPages, currentPage + maxVisibleButtons);

    if (startPage > 1) {
    container.innerHTML += `<li class="page-item"><button class="page-link" onclick="changePage(1)">1</button></li>`;
    if (startPage > 2) container.innerHTML += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
}

    for (let i = startPage; i <= endPage; i++) {
        const activeClass = i === currentPage ? 'active' : '';
        container.innerHTML += `
            <li class="page-item ${activeClass}">
                <button class="page-link" onclick="changePage(${i})">${i}</button>
            </li>
        `;
    }

    if (endPage < totalPages) {
    if (endPage < totalPages - 1) container.innerHTML += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
    container.innerHTML += `<li class="page-item"><button class="page-link" onclick="changePage(${totalPages})">${totalPages}</button></li>`;
}

    const nextDisabled = currentPage === totalPages ? 'disabled' : '';
    container.innerHTML += `
        <li class="page-item ${nextDisabled}">
            <button class="page-link" onclick="changePage(${currentPage + 1})">
                <i class="bi bi-chevron-right"></i>
            </button>
        </li>
    `;
}

function changePage(page) {
    const search = document.getElementById('searchInputProd').value;
    loadProducts(page, search);
}