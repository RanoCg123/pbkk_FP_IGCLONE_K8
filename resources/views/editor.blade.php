<x-app-layout>
    <style>
 body {
    margin: 0;
    font-family: sans-serif;
    background-color: #121212; /* Dark background color */
    color: #ffffff; /* Light text color */
}

.editor {
    display: flex;
    width: 100vw;
    height: 100vh;
}

.toolbar {
    width: 250px;
    background: #333333; /* Dark toolbar background color */
    color: #ffffff; /* Light text color */
}

.toolbar-item {
    padding: 15px;
}

.tool-label {
    display: block;
    margin-bottom: 5px;
    font-size: 14px;
    font-weight: bold;
    color: #ffffff; /* Light text color */
}

.tool-input {
    width: 100%;
    background: #444444; /* Dark input background color */
    color: #ffffff; /* Light text color */
    border: 1px solid #666666; /* Dark border color */
}

.tool-input:focus {
    outline: none;
    border: 1px solid #ffffff; /* Light border color on focus */
}

.image-area {
    flex-grow: 1;
    padding: 20px;
    background: #222222; /* Dark image area background color */
}

#canvas {
    max-width: 100%;
    max-height: 100%;
}

/* Slider styles */
input[type="range"] {
    background: #666666; /* Dark slider background color */
}

input[type="range"]::-webkit-slider-thumb {
    background: #ffffff; /* Light slider thumb color */
}

input[type="range"]::-moz-range-thumb {
    background: #ffffff; /* Light slider thumb color for Firefox */
}

input[type="range"]::-ms-thumb {
    background: #ffffff; /* Light slider thumb color for Edge */
}

input[type="range"]::-webkit-slider-runnable-track {
    background: #444444; /* Dark slider track color for WebKit browsers */
}

input[type="range"]::-moz-range-track {
    background: #444444; /* Dark slider track color for Firefox */
}

input[type="range"]::-ms-track {
    background: #444444; /* Dark slider track color for Edge */
}
    </style>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Photo') }}
        </h2>
    </x-slot>
    <div class="editor">
  <div class="toolbar">
    <div class="toolbar-item">
      <input type="file" id="imageFileInput">
    </div>
    <div class="toolbar-item">
      <label class="tool-label" for="brightness">Brightness</label>
      <input class="tool-input" type="range" id="brightness" min="0" max="200">
    </div>
    <div class="toolbar-item">
      <label class="tool-label" for="saturation">Saturation</label>
      <input class="tool-input" type="range" id="saturation" min="0" max="200">
    </div>
    <div class="toolbar-item">
      <label class="tool-label" for="blur">Blur</label>
      <input class="tool-input" type="range" id="blur" min="0" max="25">
    </div>
    <div class="toolbar-item">
      <label class="tool-label" for="inversion">Inversion</label>
      <input class="tool-input" type="range" id="inversion" min="0" max="100">
    </div>
    <button id="downloadBtn">Download</button>
  </div>
  <div class="image-area">
    <canvas id="canvas" height="500" width="500"></canvas>
  </div>
</div>
<script>
    const fileInput = document.querySelector("#imageFileInput");
const canvas = document.querySelector("#canvas");
const canvasCtx = canvas.getContext("2d");
const brightnessInput = document.querySelector("#brightness");
const saturationInput = document.querySelector("#saturation");
const blurInput = document.querySelector("#blur");
const inversionInput = document.querySelector("#inversion");

const settings = {};
let image = null;

function resetSettings() {
  settings.brightness = "100";
  settings.saturation = "100";
  settings.blur = "0";
  settings.inversion = "0";

  brightnessInput.value = settings.brightness;
  saturationInput.value = settings.saturation;
  blurInput.value = settings.blur;
  inversionInput.value = settings.inversion;
}

function updateSetting(key, value) {
  if (!image) return;

  settings[key] = value;
  renderImage();
}

function generateFilter() {
  const { brightness, saturation, blur, inversion } = settings;

  return `brightness(${brightness}%) saturate(${saturation}%) blur(${blur}px) invert(${inversion}%)`;
}

function renderImage() {
  canvas.width = image.width;
  canvas.height = image.height;

  canvasCtx.filter = generateFilter();
  canvasCtx.drawImage(image, 0, 0);
}

brightnessInput.addEventListener("change", () =>
  updateSetting("brightness", brightnessInput.value)
);
saturationInput.addEventListener("change", () =>
  updateSetting("saturation", saturationInput.value)
);
blurInput.addEventListener("change", () =>
  updateSetting("blur", blurInput.value)
);
inversionInput.addEventListener("change", () =>
  updateSetting("inversion", inversionInput.value)
);

fileInput.addEventListener("change", () => {
  image = new Image();

  image.addEventListener("load", () => {
    resetSettings();
    renderImage();
  });

  image.src = URL.createObjectURL(fileInput.files[0]);
});
const downloadBtn = document.getElementById("downloadBtn");

downloadBtn.addEventListener("click", () => {
    const originalFilename = fileInput.files[0]?.name || "edited_image.png";
    const editedFilename = `edited_${originalFilename}`;
    const downloadLink = document.createElement("a");
    downloadLink.href = canvas.toDataURL("image/png");
    downloadLink.download = editedFilename;
    document.body.appendChild(downloadLink);
    downloadLink.click();
    document.body.removeChild(downloadLink);
});
resetSettings();

</script>
</x-app-layout>