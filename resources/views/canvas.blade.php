<div>
    @if ($base64Pdf)
        <div id="pdf-parent">
            <canvas id="pdf-canvas" class="w-full border"></canvas>
        </div>

        @script
        <script>
            const oldCanvas = document.getElementById('pdf-canvas');
            const newCanvas = document.createElement('canvas');
            newCanvas.id = 'pdf-canvas';
            newCanvas.className = 'w-full border';

            oldCanvas.remove();
            document.getElementById('pdf-parent').appendChild(newCanvas);

            const initialPDF = '{{ $base64Pdf }}';

            if (initialPDF) {
                renderPDF(initialPDF);
            }

            function renderPDF(base64PDF) {
                const pdfCanvas = document.getElementById('pdf-canvas');
                const pdfContext = pdfCanvas.getContext('2d');
                const pdfData = base64ToUint8Array(base64PDF);

                pdfjsLib.GlobalWorkerOptions.workerSrc = '{{ $worker }}';

                pdfjsLib.getDocument({ data: pdfData }).promise.then(pdf => {
                    pdf.getPage(1).then(page => {
                        const viewport = page.getViewport({ scale: 1.5 });
                        pdfCanvas.width = viewport.width;
                        pdfCanvas.height = viewport.height;

                        const renderContext = {
                            canvasContext: pdfContext,
                            viewport: viewport,
                        };
                        page.render(renderContext);
                    });
                });
            }

            function base64ToUint8Array(base64) {
                const binaryString = atob(base64);
                const len = binaryString.length;
                const bytes = new Uint8Array(len);
                for (let i = 0; i < len; i++) {
                    bytes[i] = binaryString.charCodeAt(i);
                }
                return bytes;
            }
        </script>
        @endscript
    @endif
</div>
