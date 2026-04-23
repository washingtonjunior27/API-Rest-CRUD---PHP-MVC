document.getElementById('deleteUserForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(e.target);
    const data = Object.fromEntries(formData.entries());

    const response = await fetch('api-user/delete', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    });

    const result = await response.json();

    if(result.success){
        window.location.href = 'logout';
    }else{
        const alertHtml = `
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            ${result.message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        `;
        document.getElementById('alert-container-delete-user').innerHTML = alertHtml;
    }
})