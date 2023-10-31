'use strict'

{
  //ローディングスクリプト

  window.addEventListener('load', function() {
    // ローディング画面を一定時間表示した後非表示にする
    var loadingScreen = document.getElementById('loading-screen');
    setTimeout(function() {
      loadingScreen.style.display = 'none';
    }, 1500); // 3000ミリ秒（3秒）後に非表示にする
  });




// クイズのボタン要素を取得
const randomBtn = document.querySelector('.random-btn');

// randomBtnが存在する場合に処理を実行
if (randomBtn) {
  // randomBtnが見える位置までスクロールする関数
  function scrollToRandomBtn() {
    randomBtn.scrollIntoView({ behavior: 'smooth' });
  }

  // ページ読み込み後、0.5秒遅延でスクロールする
  window.addEventListener('load', () => {
    setTimeout(scrollToRandomBtn, 500); // 遅延時間 (ミリ秒)
  });
}

  //js for quiz//

  // JavaScriptファイル (main.js) に追加
document.addEventListener("DOMContentLoaded", function () {
  // .random-btn-for-word をクリックしたときの処理
  document.querySelector('.random-btn-for-word').addEventListener('click', function () {
      toggleOverlay('overlay-word');
  });

  // .random-btn-for-means をクリックしたときの処理
  document.querySelector('.random-btn-for-means').addEventListener('click', function () {
      toggleOverlay('overlay-means');
  });
});

// オーバーレイを切り替える共通の関数
function toggleOverlay(className) {
  const overlay = document.querySelector('.' + className);

  // オーバーレイの表示/非表示を切り替える
  if (overlay.style.display === 'none' || overlay.style.display === '') {
      overlay.style.display = 'block';
  } else {
      overlay.style.display = 'none';
  }
}


}