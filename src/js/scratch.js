{
  const $canvas = document.getElementById('canvas');
  const ctx = $canvas.getContext('2d');
  let brushRadius = ($canvas.width / 100) * 5;
  if (brushRadius < 10) { brushRadius = 10; }

  const img = new Image();

  const init = () => {
    $canvas.addEventListener(`mousemove`, event => mousemoveHandler(event));
    $canvas.addEventListener(`touchmove`, event => touchmoveHandler(event));

    console.log('longread');
  };

  // START NIET CORRECT
  img.onload = function () {
    ctx.drawImage(img, 0, 0, $canvas.width, $canvas.height);
  };

  img.src = '../../assets/beelden/kras-top.png';
  console.log(img);

  const detectLeftButton = event => {
    if ('buttons' in event) {
      return event.buttons === 1;
    } else if ('which' in event) {
      return event.which === 1;
    } else {
      return event.button === 1;
    }
  };
  // EINDE NIET CORRECT

  const mousemoveHandler = event => {
    const brushPos = getBrushPos(event.clientX, event.clientY);
    const leftBut = detectLeftButton(event);
    if (leftBut == 1) {
      drawDot(brushPos.x, brushPos.y);
    }
  };

  const touchmoveHandler = event => {
    event.preventDefault();
    const touch = event.targetTouches[0];
    if (touch) {
      const brushPos = getBrushPos(touch.pageX, touch.pageY);
      drawDot(brushPos.x, brushPos.y);
    }
  };

  const drawDot = (mouseX, mouseY) => {
    ctx.beginPath();
    ctx.arc(mouseX, mouseY, brushRadius, 0, 2 * Math.PI, true);
    ctx.fillStyle = '#000';
    ctx.globalCompositeOperation = 'destination-out';
    ctx.fill();
  };

  const getBrushPos = (xRef, yRef) => {
    const canvasRect = $canvas.getBoundingClientRect();
    return {
      x: Math.floor((xRef - canvasRect.left) / (canvasRect.right - canvasRect.left) * $canvas.width),
      y: Math.floor((yRef - canvasRect.top) / (canvasRect.bottom - canvasRect.top) * $canvas.height)
    };
  };

  init();
}
