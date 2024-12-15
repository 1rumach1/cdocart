<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Preview Only</title>
</head>
<body>
    <button id="previewButton">Show PDF Preview</button>
    <iframe id="pdfPreview" style="width: 100%; height: 500px; border: none; display: none;"></iframe>
    <div id="try">

    </div>

    <script>
        document.getElementById('previewButton').addEventListener('click', () => {
            const iframe = document.getElementById('pdfPreview');
            const tryCon = document.getElementById('try');
            iframe.style.display = 'none';
            iframe.src = '../fpdf/generate_pdf_preview.php';
            iframe.onload = function() {
                try {
                    // Modern browsers: Attempt to trigger print preview
                    iframe.contentWindow.print();
                } catch (err) {
                    console.error('Could not open print preview:', err);
                }
            };
        });
    </script>
</body>
</html>
