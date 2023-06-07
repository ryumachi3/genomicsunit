//genom
//pixi.js v6

const MYBGAPP = {
 	ww: 0,
 	wh: 0,
 	before_ww:0,//iOSでのスクロール時resize対策
	pixi: {},
	loader:{},
	stageAngle:-10,//ステージの傾き
	beforeScrlY:0,//直前のスクロール位置
	blurFilter:0,//pixiブラーフィルタの強さ
	maxBlur:10,//ブラーの最大値

	groups:[],//文字グループオブジェクトのリスト
	groupSpeed:5,//グループの速度(スクロールによって変わる。時間とともに減衰)
	groupSpeedRate:.95,//速度の減衰率
	groupSpeedMin:1,//最小速度
	groupCharasMin:10,//グループ内の最少文字数
	groupCharasMax:30,//グループ内の最大文字数
	next_j_pos:0,//次のグループが出現するy座標

	charW: 11,//文字の幅
	charH: 22,//文字の高さ
	charCntW: 0,//横方向の文字数(画面サイズによって計算)
	charCntH: 0,//縦方向の文字数(画面サイズによって計算)
	charTTL:50,//文字の生存期間(ループ回数)
	charDelay:50,//文字の出現間隔(ms)
	charAniFrames_b:[],//文字アニメーション用フレーム(青)
	charAniFrames_w:[],//文字アニメーション用フレーム(白)
	charAniSpeed:.2,//文字アニメーションスピード(値が小さいほど遅い)

	resizeTimer:0,//画面リサイズ対策

	//レスポンシブ制御用
	isTab: false,
	isTabp: false,
	isPc: false,
	isPcw: false,
	mq_tab: window.matchMedia('screen and (min-width: 460px)'),
	mq_tabp: window.matchMedia('screen and (min-width: 768px)'),
	mq_pc: window.matchMedia('screen and (min-width: 960px)'),
	mq_pcw: window.matchMedia('screen and (min-width: 1280px)'),

};


MYBGAPP.init = () => {

	//レスポンシブ制御
	MYBGAPP.mq_tab.addListener(MYBGAPP.evtBreakPointTab);
	MYBGAPP.mq_tabp.addListener(MYBGAPP.evtBreakPointTabp);
	MYBGAPP.mq_pc.addListener(MYBGAPP.evtBreakPointPc);
	MYBGAPP.mq_pcw.addListener(MYBGAPP.evtBreakPointPcw);
	MYBGAPP.evtBreakPointTab();
	MYBGAPP.evtBreakPointTabp();
	MYBGAPP.evtBreakPointPc();
	MYBGAPP.evtBreakPointPcw();

	//#bgのサイズを元に幅と高さを設定
  const target = document.getElementById('bg');
  MYBGAPP.ww = target.offsetWidth;
  MYBGAPP.wh = target.offsetHeight;
  MYBGAPP.before_ww = MYBGAPP.ww;

	//画像のプリロード
	MYBGAPP.loader = PIXI.Loader.shared;
	MYBGAPP.loader.add('spriteSheet', template_url + '/img/bgwords.png');

	//pixi準備
	MYBGAPP.pixi = new PIXI.Application({
		width:MYBGAPP.ww,
		height:MYBGAPP.wh,
		transparent:true,
	});
	const bgArea = document.getElementById('bg');
	bgArea.appendChild(MYBGAPP.pixi.view);

	MYBGAPP.blurFilter = new PIXI.filters.BlurFilter();
	MYBGAPP.blurFilter.blur = 0;
	MYBGAPP.pixi.stage.filters = [MYBGAPP.blurFilter];

	//ステージを傾ける
	MYBGAPP.pixi.stage.rotation = Math.PI/180 * MYBGAPP.stageAngle;

	//縦横の文字数
	MYBGAPP.charCntW = Math.ceil(MYBGAPP.ww / MYBGAPP.charW);
	MYBGAPP.charCntH = Math.ceil(MYBGAPP.wh / MYBGAPP.charH);

	//任意のタイミングでスタート
	// setTimeout(() => {
		
	// 	MYBGAPP.start();

	// }, 500);

}


MYBGAPP.start = () => {

	//画像がロードされたら
	MYBGAPP.loader.load((loader, resources) => {

		//アニメーション用フレームを準備
		const spriteSheet = resources['spriteSheet'].texture;
		for(let k = 0; k < 8; k++){
			const frame = new PIXI.Texture(spriteSheet, new PIXI.Rectangle(64*k, 0, 64, 64));
			if(k < 4){
				MYBGAPP.charAniFrames_b.push(frame);
			}else{
				MYBGAPP.charAniFrames_w.push(frame);
			}
		}

		//文字グループ作成
		MYBGAPP.createGroups();

		//ページ表示直後はしばらくステージを透明にしないための設定
		let allowAlpha = false;
		setTimeout(() => {
			allowAlpha = true;
		},3000);

		//ループ
		MYBGAPP.pixi.ticker.add((delta) => {

			for(let k = 0; k < MYBGAPP.groups.length; k++){
				MYBGAPP.groups[k].update();
			}

			//時間と共にスピードを減衰
			MYBGAPP.groupSpeed *= MYBGAPP.groupSpeedRate;
			if(MYBGAPP.groupSpeed <= MYBGAPP.groupSpeedMin) MYBGAPP.groupSpeed = MYBGAPP.groupSpeedMin;

			//時間と共にステージをぼかす
			if(allowAlpha){
				if(MYBGAPP.groupSpeed <= MYBGAPP.groupSpeedMin) MYBGAPP.blurFilter.blur += .1;
				if(MYBGAPP.blurFilter.blur >= MYBGAPP.maxBlur) MYBGAPP.blurFilter.blur = MYBGAPP.maxBlur;
			}

			// 一定のスピードでスクロールするとステージをくっきり
			if(MYBGAPP.groupSpeed > MYBGAPP.groupSpeedMin) MYBGAPP.blurFilter.blur -= .3;
			if(MYBGAPP.blurFilter.blur <= 0) MYBGAPP.blurFilter.blur = 0;
		});

	});
	
};



//クリア
MYBGAPP.clear = () => {

	//オブジェクトを全て削除(メモリからも解放)
	for(let k = MYBGAPP.pixi.stage.children.length - 1; k >= 0; k--){
		const obj = MYBGAPP.pixi.stage.children[k];
		obj.destroy({
			children: true,
			texture: false,//テクスチャは解放しない
			baseTexture: false
		});
	}
	MYBGAPP.groups.length = 0;
	MYBGAPP.next_j_pos = 0;
}


//文字グループ作成
MYBGAPP.createGroups = () => {
		
		//グループ作成
		while(MYBGAPP.next_j_pos < MYBGAPP.charCntH){//画面の一番下にたどり着くまで

			//iとjはx方向y方向のグリッド位置
			let i = Math.floor(-MYBGAPP.charCntW*1/4 + Math.random()*MYBGAPP.charCntW*5/4);
			let j = MYBGAPP.next_j_pos;
			let group = new MYBGAPP.CharGroupUnit(i,j);
			MYBGAPP.groups.push(group);

			//y方向の次の位置をある程度ランダムに
			MYBGAPP.next_j_pos += 2 + Math.floor(Math.random()*0);

		}

		//グループを順番に表示
		for(let k = 0; k < MYBGAPP.groups.length; k++){
			setTimeout(() => {
				if(MYBGAPP.groups[k] != null){
					MYBGAPP.groups[k].start();
				}
			},MYBGAPP.charDelay*k);
		}
}


MYBGAPP.CharGroupUnit = class {

	constructor(i,j){
		this.containerObj = new PIXI.Container();
		this.containerObj.x = MYBGAPP.charW*i;
		this.containerObj.y = MYBGAPP.charH*j;
		this.innerClock = 0;//内部カウンター

		MYBGAPP.pixi.stage.addChild(this.containerObj);

		//文字を作成
		const num = MYBGAPP.groupCharasMin + Math.floor(Math.random()*(MYBGAPP.groupCharasMax - MYBGAPP.groupCharasMin));
		for(let l = 0; l < num; l++){

			//青文字か白文字をランダムで決定
			const frame = Math.random()>.5?MYBGAPP.charAniFrames_b:MYBGAPP.charAniFrames_w;

			const sprite = new PIXI.AnimatedSprite(frame);
			sprite.animationSpeed = MYBGAPP.charAniSpeed;
			sprite.x = MYBGAPP.charW * l;
			sprite.width = MYBGAPP.charH*.9;//細身のフォントだけど画像では正方形なのでcharHを使用
			sprite.height = MYBGAPP.charH*.9;
			sprite.visible = false;//各文字は非表示にしておく
			sprite.ttl = MYBGAPP.charTTL;//生存期間(独自パラメタ)
			this.containerObj.addChild(sprite);
		}
	}

	start() {

		//グループ内の文字を
		for(let k = 0; k < this.containerObj.children.length; k++){
			let sprite = this.containerObj.children[k];
			
			//初期化して
			sprite.visible = false;
			sprite.ttl = MYBGAPP.charTTL;
			sprite.stop();

			//時間をずらして表示
			setTimeout(() => {				
				sprite.visible = true;
				sprite.gotoAndPlay(Math.floor(Math.random()*sprite.totalFrames));
			},MYBGAPP.charDelay*k);
		}
	}

	update() {

		//グループを動かす
		this.containerObj.y -= MYBGAPP.groupSpeed;

		//グループが画面上部に消えたら下に復活
		if(this.containerObj.y < -MYBGAPP.charH*2){
			let i = Math.floor(-MYBGAPP.charCntW*1/4 + Math.random()*MYBGAPP.charCntW*5/4);
			this.containerObj.x = MYBGAPP.charW*i;
			this.containerObj.y = MYBGAPP.charH*MYBGAPP.charCntH;
			this.start();
		}

		//スクロールスピードが一定を超えたら(かつinnerClockで頻度を抑える)
		if(MYBGAPP.groupSpeed > MYBGAPP.groupSpeedMin && this.innerClock%10==0){

			//一部のグループはアニメーション
			if(Math.random() < .1){
				for(let k = 0; k < this.containerObj.children.length; k++){
					let sprite = this.containerObj.children[k];
					setTimeout(() => {				
						sprite.ttl = MYBGAPP.charTTL;//TTLを再設定
						sprite.gotoAndPlay(Math.floor(Math.random()*sprite.totalFrames));
					},Math.floor(MYBGAPP.charDelay*this.containerObj.children.length*Math.random()));
				}
			}
		}

		//TTLの更新
		for(let k = 0; k < this.containerObj.children.length; k++){
			let sprite = this.containerObj.children[k];

			if(sprite.ttl <= 0){
				sprite.stop();
			}

			if(sprite.visible){
				sprite.ttl--;
			}

		}

		this.innerClock++;
	}
} 




MYBGAPP.resize = () => {

	const target = document.getElementById('bg');
  MYBGAPP.ww = target.offsetWidth;
  MYBGAPP.wh = target.offsetHeight;

  //iOSスクロール時resize対策(横幅が変わっていない場合はresizeとみなさない)
  if(MYBGAPP.ww == MYBGAPP.before_ww) return;

	MYBGAPP.charCntW = Math.ceil(MYBGAPP.ww / MYBGAPP.charW);
	MYBGAPP.charCntH = Math.ceil(MYBGAPP.wh / MYBGAPP.charH);

	//リサイズ処理が何度も実行されないように
	clearTimeout(MYBGAPP.resizeTimer);
	MYBGAPP.resizeTimer = setTimeout(() => {
		
		MYBGAPP.pixi.renderer.resize(MYBGAPP.ww,MYBGAPP.wh);
		MYBGAPP.clear();
		MYBGAPP.createGroups();

	}, 500);

	MYBGAPP.before_ww = MYBGAPP.ww;
}




MYBGAPP.scroll = () => {
	let curScrlY = window.scrollY;
	let scrlDiff = Math.abs(curScrlY - MYBGAPP.beforeScrlY);
	MYBGAPP.beforeScrlY = curScrlY;

	//スクロール量に応じて加速
	MYBGAPP.groupSpeed += scrlDiff/100;

}




//ブレイクポイントが切り替わる度に呼ばれる（sp <-> tab）
MYBGAPP.evtBreakPointTab = () => {

  //ここでのthisはリスナーを登録したオブジェクトになるので注意

  if(MYBGAPP.mq_tab.matches){
    //spからtabへ
    MYBGAPP.isTab = true;

  }else{
    //tabからspへ
    MYBGAPP.isTab = false;

  }

}


//ブレイクポイントが切り替わる度に呼ばれる（tab <-> tabp）
MYBGAPP.evtBreakPointTabp = () => {

  //ここでのthisはリスナーを登録したオブジェクトになるので注意

  if(MYBGAPP.mq_tabp.matches){
    //tabからtabpへ
    MYBGAPP.isTabp = true;

  }else{
    //tabpからtabへ
    MYBGAPP.isTabp = false;

  }

}


//ブレイクポイントが切り替わる度に呼ばれる（tabp <-> pc）
MYBGAPP.evtBreakPointPc = () => {

  //ここでのthisはリスナーを登録したオブジェクトになるので注意

  if(MYBGAPP.mq_pc.matches){
    //tabpからpcへ
    MYBGAPP.isPc = true;

    MYBGAPP.groupCharasMin = 20;
		MYBGAPP.groupCharasMax = 50;

  }else{
    //pcからtabpへ
    MYBGAPP.isPc = false;

    MYBGAPP.groupCharasMin = 10;
		MYBGAPP.groupCharasMax = 30;
    
  }

}


//ブレイクポイントが切り替わる度に呼ばれる（pc <-> pcw）
MYBGAPP.evtBreakPointPcw = () => {

  //ここでのthisはリスナーを登録したオブジェクトになるので注意

  if(MYBGAPP.mq_pcw.matches){
    //pcからpcwへ
    MYBGAPP.isPcw = true;

  }else{
    //pcwからpcへ
    MYBGAPP.isPcw = false;

  }

}


window.addEventListener('DOMContentLoaded', MYBGAPP.init);
window.addEventListener('resize', MYBGAPP.resize);
window.addEventListener("scroll", MYBGAPP.scroll);

