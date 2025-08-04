<div class="content" style="align-items: normal; padding: 20px; overflow: hidden;">
    <div class="content-area-wrapper">
        <p>Home Page</p>

        <div id="container-canvas-frame" class="content-area" style="background: inherit;">
            <iframe id="canvas-engine-frame-holder" style="height: calc(100vh  + calc(100vh * 0.3)) !important; max-width: calc(400vw - 25px); width: 100vw; transform: scale(0.7); transform-origin: 0 0; border: 3px solid #6c2bd9; transition: .3s; border-radius: 13px;" src="http://localhost/online-store.varsitymarket.package/website-builder/canvas/"></iframe>
            
            <div id="container-canvas-frame-resizer"></div>
        </div>

    </div>
</div>
<!-- 

<style>

#container-canvas-frame {
  position: relative;
  width: 600px;
  height: 400px;
  border: 1px solid #ccc;
  overflow: hidden; /* Prevents scrollbars during resize */
}

iframe {
  width: 100%;
  height: 100%;
  border: none;
}

#container-canvas-frame-resizer {
  position: absolute;
  bottom: 0;
  right: 0;
  width: 20px;
  height: 20px;
  background-color: #3498db; /* Blue resizer */
  cursor: se-resize;
  z-index: 10; /* Ensure it's above the iframe */
}
</style>

<script>
const container = document.getElementById('container-canvas-frame');
const iframe = document.querySelector('iframe');
const resizer = document.getElementById('container-canvas-frame-resizer');

let isResizing = false;
let startX, startY, startWidth, startHeight;

resizer.addEventListener('mousedown', function(e) {
  isResizing = true;
  startX = e.clientX;
  startY = e.clientY;
  startWidth = container.offsetWidth;
  startHeight = container.offsetHeight;
  document.addEventListener('mousemove', resize);
  document.addEventListener('mouseup', stopResize);
});

function resize(e) {
  if (!isResizing) return;

  const width = startWidth + e.clientX - startX;
  const height = startHeight + e.clientY - startY;

  container.style.width = width + 'px';
  container.style.height = height + 'px';
}

function stopResize(e) {
  isResizing = false;
  document.removeEventListener('mousemove', resize);
  document.removeEventListener('mouseup', stopResize);
}
</script>

            -->