<!DOCTYPE html>
<html>
<head>
    <title>Xuất hóa đơn PDF</title>
</head>
<body>
    <button id="exportButton">Xuất hóa đơn PDF</button>

    <script>
        document.getElementById("exportButton").addEventListener("click", function() {
            // Gửi yêu cầu xuất PDF đến máy chủ PHP
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "export_pdf.php", true);
            xhr.responseType = "blob"; // Để xử lý file dạng blob
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Tạo một đường dẫn URL cho file PDF và tải nó về
                    var blob = new Blob([xhr.response], { type: "application/pdf" });
                    var url = window.URL.createObjectURL(blob);
                    var a = document.createElement("a");
                    a.href = url;
                    a.download = "hoa_don.pdf"; // Tên file khi tải về
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);
                }
            };
            xhr.send();
        });
    </script>
</body>
</html>









