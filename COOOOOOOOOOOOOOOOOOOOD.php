 <form class="form-inline" method="POST" enctype="multipart/form-data" action="getFilledPdf">
        <div class="form-group">
        <input type="file" class="form-control" id="pdfile" placeholder="file" accept="application/pdf" name="pdfFile">
        </div>
        <input type="submit" class="btn btn-primary active" value="Upload Pdf">
    </form>

<div class="row" style="height: 450px;">
    <object data="getFilledPdfFromResource" type="application/pdf" width="700" height="450" id="filledPdfContentArea"/>
</div>
<script type="text/javascript">
window.addEventListener('load', function() {
                document.querySelector('input[type="file"]').addEventListener('change', function() {
                if (this.files && this.files[0]) {
                var object= document.querySelector('object'); // $('object')[0]
                object.src = URL.createObjectURL(this.files[0]); // set src to file url
                }
            });
        });
</script>