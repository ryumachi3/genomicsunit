const TB = 769;
const PC = 1280;

const wp_dir = "/wp/";


new Vue({
  el: '#app',
  data: {
    scrollY: 0,
    isLoad: false,
    isDown: false,
    isMenu: false,
    isLeadEnd: false,
    isTopPage: false,
    isWorksPage: false,
    isWorksDtPage: false,
    isTb: false,
    isPC: false,
    isloading: true,
    isloadingLogo: false,
    cursorX: 0,
    cursorY: 0,
    cursorW: '40px',
    cursorH: '40px',
    cursorRadius: '50%',
  },
  created() {
    // 初回読み込み時のみ実行する処理を記述

  },
  mounted() {

    setTimeout(() => {
      this.isloading = false;
    }, 1500);

    window.addEventListener('scroll', this.handleScroll);
    window.addEventListener('resize', this.handleResize);
    window.addEventListener('mousemove', this.handleMousemove);
    window.addEventListener("keydown", this.handleKeyDown);    


    if (window.innerWidth >= PC) {
      this.isPC = true;
      this.isTb = false;
    } else if (window.innerWidth >= TB) {
      this.isPC = false;
      this.isTb = true;
    } else {
      this.isPC = false;
      this.isTb = false;
    }
    this.isLoad = true;

    if (location.pathname == '/stg/' || location.pathname == '/wp/' || location.pathname == '/') {
      this.isTopPage = true;
      this.isloadingLogo = false;

      const mvtl = gsap.timeline({ repeat: 0, repeatDelay: 0.5 });

      let head_class = '';

      mvtl.to(".p-header", {
        opacity: 1,
        delay: .2,
        duration: .2,
        x: 0,
        ease: "power4.out",
      },);
      mvtl.to(".p-header-sp", {
        opacity: 1,
        delay: .2,
        duration: .3,
        ease: "power4.out",
      },"<");
      mvtl.to(".l-main", {
          opacity: 1,
          duration: .05,
          ease: "power4.out",
        }, "+=.6");
      mvtl.from(".p-kv__inner__title__line1", {
        x: 20,
        opacity: 0,
        duration: .4,
      }, "<");
      mvtl.from(".p-kv__inner__title__line2", {
        x: -20,
        opacity: 0,
        duration: .4,
      }, "<");
      mvtl.from(".p-kv__inner__title__char__inner", {
        y: 60,
        duration: .4,
        ease: "power4.out",
        stagger: 0.1, // 0.02秒ごとに出現
      });
      mvtl.from(".p-kv__inner__photo__main", {
        opacity: 0,
        duration: .5,
        ease: "power2.out",
      },"+=.3");
      mvtl.from(".p-kv__inner__photo__sub", {
        duration: .5,
        opacity: 0,
        ease: "power2.out",
      }, "<");
      mvtl.from(".p-kv__inner__description__txt", {
        duration: .4,
        opacity: 0,
        ease: "power2.out",
      }, "<");
      mvtl.from(".p-kv__inner__description__illust__wrap", {
        duration: .4,
        opacity: 0,
        ease: "power2.out",
      }, "<");
      mvtl.from("#contents", {
        opacity: 0,
        duration: .6,
        y: 20,          
        ease: "power2.out",
      }, "-=.4");
      mvtl.from(".g-mv-txt-point", {
        color: '#2C4680',
        duration: 1,
        ease: "power2.out",
      }, "-=.4");

    } else {

      setTimeout(() => {
        this.isloading = false;
      }, 1000);
      this.isTop = false;
      this.isTopPage = false;
      let rootPath = '';
      console.log('location.pathname', location.pathname);
      if (location.pathname.indexOf(wp_dir) === 0) {
        rootPath = wp_dir;
      } else {
        rootPath = '/';
      }
      console.log('rootPath', rootPath);

      gsap.to(".l-common-sec", {
        opacity: 1,
        duration: .01,
      })

    const othertl = gsap.timeline({ repeat: 0, repeatDelay: 0.5 });

    //正規表現パターン（半角英数４桁に一致）
    var regex = new RegExp(/\/news\/.*\//);
    if (regex.test(location.pathname)) {
      gsap
        .timeline({ repeat: 0, repeatDelay: 0.5 })
        .to(".p-header", {
          opacity: 1,
          delay: .2,
          duration: .2,
          x: 0,
          ease: "power4.out",
        },)
        .to(".p-header-sp", {
          opacity: 1,
          delay: .2,
          duration: .3,
          ease: "power4.out",
        },"<")  
        .to(".l-main", {
          opacity: 1,
          duration: .05,
          ease: "power4.out",
        },"+=.5")
        .from(".c-contents", {
          opacity: 0,
          duration: .7,
          y: 20,
          ease: "power2.out",
        })
    } else {
      gsap
        .timeline({ repeat: 0, repeatDelay: 0.5 })
        .to(".p-header", {
          opacity: 1,
          delay: .2,
          duration: .2,
          x: 0,
          ease: "power4.out",
        },)
        .to(".p-header-sp", {
          opacity: 1,
          delay: .2,
          duration: .3,
          ease: "power4.out",
        },"<")
        .to(".l-main", {
          opacity: 1,
          duration: .05,
          ease: "power4.out",
        },"+=.5")
        .from(".c-head-title.-anime", {
          y: 10,
          opacity: 0,
          duration: .5,
        },"<")
        .from(".c-head-title__char__inner", {
          y: 100,
          duration: .5,
          ease: "power4.out",
          stagger: 0.03, // 0.02秒ごとに出現
        })
        .from(".c-contents", {
          opacity: 0,
          duration: .7,
          y: 20,
          ease: "power2.out",
        })
    }
  }



    // gsap
    // .timeline({ repeat: -1, repeatDelay: 0.5 })
    // .from(".p-kv__inner__photo__main", {
    //   delay: 2,      
    //   duration: 2,
    //   scale: 100,
    //   autoAlpha: 0,      
    //   ease: "power4.out",
    // })

    
    const staggerPoint = gsap.utils.toArray(".u-txt-point");

    staggerPoint.forEach((point) => {
      gsap.from(point, {
        color: '#2C4680',
        duration: 1,
        ease: "power2.out",
        scrollTrigger: {
          trigger: point,
          start: 'top 88%'
        },
      });
    });


    const staggerTopTitle = gsap.utils.toArray(".c-top-title");
    staggerTopTitle.forEach((title) => {
      gsap.from(title.querySelectorAll(".c-top-title-child"), {
        opacity: 0,
        stagger: 0.1,
        duration: 0.1,
        ease: "power2.out",
        scrollTrigger: {
          trigger: title,
          start: 'top 90%'
        },
      });
    });


    const staggerSquareTitle = gsap.utils.toArray(".c-square-title");
    staggerSquareTitle.forEach((title) => {
      gsap.from(title.querySelectorAll(".c-square-title__char__inner"), {
        y: 40,
        stagger: 0.1,
        duration: 0.5,
        ease: "power4.out",
        scrollTrigger: {
          trigger: title,
          start: 'top 95%'
        },
      });
    });

    const staggerTitle = gsap.utils.toArray(".c-title");
    staggerTitle.forEach((title) => {
      gsap.timeline({ 
        repeat: 0,
        scrollTrigger: {
          trigger: title,
          start: 'top 88%'
        },
      })
      .from(title.querySelector(".c-title__line-tate"), {
        height: 0,
        duration: 1,
        ease: "power4.out",
      })
      .from(title.querySelector(".c-title__line-yoko"), {
        width: 0,
        duration: 1.3,
        ease: "power4.out",
      }, "<");
    });

    const mediaQuery = window.matchMedia('(max-width: 1280px)');
    const pNav = document.querySelector('.p-nav__list');
    const footer = document.getElementById('footer');    
    const pNavHeight = pNav.offsetHeight; // .p-navの高さを取得
    const pNavTop = pNav.offsetTop; // .p-navのページ上部からの位置を取得
    gsap.to('.g-nav-access-horn', {
      x: mediaQuery.matches ? -13 : 0,
      duration: 0.25,
      ease: 'power4.out',
      scrollTrigger: {
        trigger: footer, // トリガーをfooterに設定
        start: `top ${pNavTop + pNavHeight}px`, // .p-nav__listの下端がfooterの上端に達してからアニメーションが発火する
        toggleActions: 'play reverse play reverse',
      },
    });

    // gsap.to('.g-nav-access', {
    //   x: 10,
    //   duration: 0.15,
    //   ease: "power4.out",
    //   scrollTrigger: {
    //     trigger: '.g-access',
    //     start: 'top 95%',
    //     end: 'bottom top', // アニメーションを元に戻す位置を指定

    //     toggleActions: "play reverse play reverse" // アニメーションの再生と逆再生を指定 
    //   },
    // });
    
    // リロード時も最上部を表示するために、ページの上部にスクロールする処理
    $(function() {
      $('html,body').animate({ scrollTop: 0 }, '1');
    });
  },

  beforeDestroy() {
    window.removeEventListener('resize', this.handleResize);
    window.removeEventListener('scroll', this.handleScroll);
    window.removeEventListener("keydown", this.handleKeyDown);    
    window.removeEventListener('mousemove', this.handleMousemove);
  },
  methods: {
    scrollToSection() {
      // Menuを閉じる
      this.isMenu = false;
    },
    clickCarouselNext(){
      // 要素の取得
      var element = document.querySelector(".carousel__button.is-next");

      // クリックイベントのトリガー
      if (element) {
        element.click();
      }
    },
    clickCarouselPrev(){
      // 要素の取得
      var element = document.querySelector(".carousel__button.is-prev");

      // クリックイベントのトリガー
      if (element) {
        element.click();
      }
    },
    clickOnEnter(event) {
      console.log('clickOnEnter!');
      // イベントが発生した要素を取得する
      const targetElement = event.target;
      // 要素をクリックする
      targetElement.click();      
    },
    clickMenu() {
      this.isMenu = !this.isMenu;

      const hamburgerButton = this.$refs.hamburger;
      hamburgerButton.setAttribute("aria-expanded", this.isOpen ? "true" : "false");

      if (this.isMenu) {
        hamburgerButton.focus();
        jQuery('a:not(.p-header a ,.p-header button)').attr('tabindex', '-1');
        jQuery('iframe').attr('tabindex', '-1');  
      }
    },
    handleKeyDown(event) {
      // Escキー押下時にメニューを閉じる
      if (event.key === "Escape") {
        this.isMenu = false;
        const hamburgerButton = this.$refs.hamburger;
        hamburgerButton.focus();
        hamburgerButton.setAttribute("aria-expanded", "false");
      }
    },
    changeImg_button(p_url, p_no) {
    },
    leaveImg_button() {
    },
    handleScroll() {
      // トップから少しスクロールした時
      (window.scrollY > 30) ? this.isDown = true : this.isDown = false;
    },
    handleResize() {
      this.isMenu = false;

      const title_tate = document.querySelectorAll(".c-title__line-tate");
      title_tate.forEach((element) => {
        element.style = "";
      });      
      const title_yoko = document.querySelectorAll(".c-title__line-yoko");
      title_yoko.forEach((element) => {
        element.style = "";
      });      

      if (window.innerWidth >= PC) {
        this.isPC = true;
        this.isTb = false;
      } else if (window.innerWidth >= TB) {
        this.isPC = false;
        this.isTb = true;
      } else {
        this.isPC = false;
        this.isTb = false;
      }
    },
    handleMousemove(event) {
      // const SURPLUS = 30; // カーソルがこれより外に出たら消す
      // this.cursorX = event.clientX;
      // this.cursorY = event.clientY;
      // const pointer = this.$refs.cursor;
    
      // // マウス下の要素一覧を取得
      // const elements = document.elementsFromPoint(event.clientX, event.clientY);
    
      // const target = elements.find((el) => el.classList.contains("js-light-out") || el.classList.contains("c-btn") || el.classList.contains("p-news-list"));
    
      // if (event.clientX < SURPLUS || event.clientY < SURPLUS || event.clientX >= window.innerWidth - SURPLUS || event.clientY >= window.innerHeight - SURPLUS) {
      //   // マウスカーソルがブラウザ画面外に出た場合
      //   pointer.style.animationName = 'light-out';
      //   pointer.style.animationDuration = '.5s';
      //   pointer.style.animationTimingFunction = 'ease-out';
      //   pointer.style.animationIterationCount = '1';
      //   pointer.style.animationFillMode = 'forwards';
      // } else if (target) {
      //   // マウスカーソルが特定の要素上にある場合
      //   pointer.style.animationName = 'light-out';
      //   pointer.style.animationDuration = '.5s';
      //   pointer.style.animationTimingFunction = 'ease-out';
      //   pointer.style.animationIterationCount = '1';
      //   pointer.style.animationFillMode = 'forwards';
      // } else {
      //   // 上記の条件に当てはまらない場合
      //   pointer.style.animationName = 'light-anime';
      //   pointer.style.animationDuration = '3.5s';
      //   pointer.style.animationTimingFunction = 'ease';
      //   pointer.style.animationIterationCount = 'infinite';
      // }      
    }
  }
})

