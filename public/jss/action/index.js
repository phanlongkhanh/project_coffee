// Xác nhận Xóa
function confirmDelete(url) {
    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa?',
        text: "Bạn không thể hoàn tác hành động này!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            // Gửi request xóa bằng JavaScript
            fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            }).then(response => {
                if (response.ok) {
                    Swal.fire({
                        title: 'Xóa thành công!',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire('Lỗi!', 'Không thể xóa món, thử lại!', 'error');
                }
            });
        }
    });
}

function confirmEdit(url) {
    Swal.fire({
        title: 'Bạn có muốn sửa?',
        text: "Hành động này sẽ đưa bạn đến trang sửa thông tin.",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sửa',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Đang chuyển hướng...',
                text: 'Vui lòng chờ...',
                icon: 'info',
                timer: 1500,
                showConfirmButton: false
            });

            setTimeout(() => {
                window.location.href = url;
            }, 1500);
        }
    });
}
