function edit(mode) {
    if (mode == "update") {
        document.getElementById("mode").value = "update";
        document.getElementById("form").submit();
    } else {
        Swal.fire({
            icon: "warning",
            title: "Delete",
            text: "Are you sure?",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("mode").value = "delete";
                document.getElementById("form").submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                return false;
            }
        })
    }
}