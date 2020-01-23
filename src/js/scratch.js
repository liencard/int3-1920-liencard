{
  let $canvas;
  let ctx;
  let brushRadius;

  const img = new Image();

  const init = () => {
    $canvas = document.getElementById('canvas');
    if ($canvas) {
      ctx = $canvas.getContext('2d');
      brushRadius = ($canvas.width / 100) * 5;
      if (brushRadius < 10) { brushRadius = 10; }
      $canvas.addEventListener(`mousemove`, e => mousemoveHandler(e));
      $canvas.addEventListener(`touchmove`, e => touchmoveHandler(e));
      //
      img.src = '../../assets/beelden/kras-top.png';

      img.addEventListener('load', event => {
        ctx.drawImage(img, 0, 0, $canvas.width, $canvas.height);
      });
    }
    console.log('longread');

    // SCROLL FUNCTION
    window.addEventListener(`scroll`, e => scrollbarHandler(e));
  };

  const scrollbarHandler = () => {
    const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (winScroll / height) * 100;
    document.getElementById('myBar').style.width = scrolled + '%';
    console.log('test');
  };

  const detectLeftButton = event => {
    console.log(event);
    if ('buttons' in event) {
      return event.buttons === 1;
    } else if ('which' in event) {
      return event.which === 1;
    } else {
      return event.button === 1;
    }
  };
  // EINDE NIET CORRECT

  const mousemoveHandler = e => {
    const brushPos = getBrushPos(e.clientX, e.clientY);
    const leftBut = detectLeftButton(e);
    if (leftBut == 1) {
      drawDot(brushPos.x, brushPos.y);
    }
  };

  const touchmoveHandler = e => {
    e.preventDefault();
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
