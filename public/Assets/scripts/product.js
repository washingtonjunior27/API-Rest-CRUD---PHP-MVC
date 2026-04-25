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