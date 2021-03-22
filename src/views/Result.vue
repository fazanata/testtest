<template>
  <div class="flex">
    <div class="mainitem">
      <p class="h1font">Результаты вашего теста:</p>
      <p class="h2font">
        Вы прошли тест и можете посмотреть на свои результаты
      </p>
      <button type="submit" class="button" v-on:click="gotoTest">
        Пройти еще раз
      </button>
      <button type="submit" class="button2">Устроить шопинг</button>
      <p class="h2font">Поделиться</p>
    </div>
    <div class="sideitem">
      <div class="item">
        <canvas id="c"></canvas>
      </div>
    </div>
  </div>
</template>

<script>
import api from '../api/api.js';

export default {
  props: ["ball"],
  data() {
    return {
      ctx: null,
      datacollection: null,
      vueCanvas: null,
      rectWidth: 200,
      ballCategory: [
        {
          id_cat: 1,
          ball: 8,
          maxBall: 12,
        },
        {
          id_cat: 2,
          ball: 4,
          maxBall: 12,
        },
        {
          id_cat: 3,
          ball: 6,
          maxBall: 12,
        },
        {
          id_cat: 4,
          ball: 2,
          maxBall: 12,
        },
        {
          id_cat: 5,
          ball: 6,
          maxBall: 12,
        },
          {
          id_cat: 6,
          ball: 10,
          maxBall: 12,
        },
      ],
      myRadius: [],
      radius: 150,
      img: [ 'assets/img/rest.png', 'assets/img/friend.png', 'assets/img/job.png', 'assets/img/brain.png','assets/img/sport.png','assets/img/heart.png'],
      name: [],
      errors: [],
    };
  },

  mounted() {
    var c = document.getElementById("c");
    var ctx = c.getContext("2d");

    ctx.canvas.width = 350;
    ctx.canvas.height = 490;
    ctx.canvas.style.width = "350px";
    ctx.canvas.style.height = "490px";
    this.vueCanvas = ctx;
    for (var j = 0; j < this.ballCategory.length; j++) {
      this.myRadius[j] =
        (this.radius * this.ballCategory[j].ball) /
        this.ballCategory[j].maxBall;
    }

    

    //http://jsfiddle.net/wm7pwL2w/2/

    this.drawArc(175, 245, 150, 0, Math.PI * 2);
    console.log("result=", this.ballsTest);
    this.plotData();
    this.drawAllCategories();
    //пишем в базу результты
    this.resultPost();

  },
  computed: {
    ballsTest() {
      return this.$store.state.ballCategory;
    }
  },
  methods: {
    resultPost() {
      axios.post(`http://test.ce74911.tmweb.ru/api_test/result/create.php`, {
        result: this.ballCategory,
        test_id: 1,
        user_id: 1
      })
      .then(response => {})
      .catch(e => {
        this.errors.push(e)
      })
    },
    drawAllCategories: async function() {
      var output = await api.axiosGetData('http://test.ce74911.tmweb.ru/api_test/category/readCategories.php');
      this.name = output['data']
      
      var lastend = 0;
      this.vueCanvas.font = "11px Roboto";
      this.vueCanvas.fillStyle = "#111259";
      for (var n = 0; n < this.ballCategory.length; n++) {
        
        this.vueCanvas.fillText(this.name[n].category_name, 175 + Math.cos(lastend + Math.PI / this.ballCategory.length)*this.radius/2, Math.sin(lastend + Math.PI / this.ballCategory.length)*this.radius/2 + 245 );
        console.log(lastend)
        let img = new Image();
        img.src = this.img[n];
        this.vueCanvas.drawImage(img, 0,0, 175 + Math.cos(lastend + Math.PI / this.ballCategory.length)*this.radius/2, Math.sin(lastend + Math.PI / this.ballCategory.length)*this.radius/2 + 245)
        console.log('img=', this.img[n])
        img.onload = function() {
          this.vueCanvas.drawImage(img, 175 + Math.cos(lastend + Math.PI / this.ballCategory.length)*this.radius/2 - 30, Math.sin(lastend + Math.PI / this.ballCategory.length)*this.radius/2 + 245 -30, 175 + Math.cos(lastend + Math.PI / this.ballCategory.length)*this.radius/2, Math.sin(lastend + Math.PI / this.ballCategory.length)*this.radius/2 + 245)
        
        };
        lastend += (Math.PI * 2) / this.ballCategory.length;
      }
      
      
    },
    gotoTest: function (event) {
      setTimeout(() => this.$router.push({ path: "category" }), 2000);
    },
    updateCanvas() {
      const { vueCanvas } = this;
    },
    drawRect() {
      this.vueCanvas.clearRect(0, 0, 400, 200);

      this.vueCanvas.beginPath();
      this.vueCanvas.rect(20, 20, this.rectWidth, 100);
      this.vueCanvas.stroke();
    },

    drawPieSlice(centerX, centerY, radius, startAngle, endAngle, color) {
      this.vueCanvas.fillStyle = color;
      this.vueCanvas.beginPath();
      this.vueCanvas.moveTo(centerX, centerY);
      this.vueCanvas.arc(centerX, centerY, radius, startAngle, endAngle);
      this.vueCanvas.closePath();
      this.vueCanvas.fill();
    },
    drawArc(centerX, centerY, radius, startAngle, endAngle) {
      this.vueCanvas.strokeStyle = "#ffffff";
      this.vueCanvas.lineWidth = 4;
      this.vueCanvas.beginPath();
      this.vueCanvas.arc(centerX, centerY, radius, startAngle, endAngle);
      this.vueCanvas.stroke();
    },
    drawLine(startX, startY, endX, endY) {
      this.vueCanvas.strokeStyle = "#ffffff";
      this.vueCanvas.lineWidth = 4;
      this.vueCanvas.beginPath();
      this.vueCanvas.moveTo(startX, startY);
      this.vueCanvas.lineTo(endX, endY);
      this.vueCanvas.stroke();
    },

    plotData() {
      var lastend = 0;

      for (var i = 0; i < this.ballCategory.length; i++) {
        this.vueCanvas.fillStyle = "#5F9AFF";
        this.vueCanvas.beginPath();
        this.vueCanvas.moveTo(175, 245);
        this.vueCanvas.arc(
          175,
          245,
          this.myRadius[i],
          lastend,
          lastend + (Math.PI * 2) / this.ballCategory.length,
          false
        );
        this.vueCanvas.lineTo(175, 245);
        this.vueCanvas.fill();
        lastend += (Math.PI * 2) / this.ballCategory.length;
      }
      lastend = 0;
      for (var k = 0; k < this.ballCategory.length; k++) {
        this.vueCanvas.strokeStyle = "#ffffff";
        this.vueCanvas.beginPath();
        this.vueCanvas.moveTo(175, 245);
        this.vueCanvas.arc(
          175,
          245,
          this.radius,
          lastend,
          lastend + (Math.PI * 2) / this.ballCategory.length,
          false
        );
        this.vueCanvas.lineTo(175, 245);
        this.vueCanvas.stroke();
        lastend += (Math.PI * 2) / this.ballCategory.length;
      }
      var img = new Image(); // Создаём новый объект Image
      img.src = this.img[0]; // Устанавливаем путь к источнику

      this.vueCanvas.drawImage(img, 200, 100);
    },
  },
};
</script>

<style lang="scss" scoped>
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap");
.body {
  font-family: arial;
  padding: 20px;
}

.flex {
  display: flex;

  max-width: 700px;
  margin: 0 auto;
}

.mainitem {
  flex-grow: 1;
  background: #c4e5fc;
  max-width: 350px;
  min-height: 490px;
}
.item {
  flex-grow: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-basis: 50%;
  min-height: 490px;
  background: #92c9ff;
}

.sideitem {
  flex-basis: 350px;
  flex-shrink: 0;

  display: flex;
  flex-direction: column;
  max-width: 350px;
}

@media screen and (max-width: 600px) {
  .flex {
    flex-wrap: wrap;
  }

  .sideitem {
    flex-direction: row;
    flex-basis: 100%;
    min-width: 350px;
  }

  .item {
    margin-left: 0;
    margin-top: 10px;
    min-width: 350px;
  }
}

@media screen and (max-width: 450px) {
  .sideitem {
    flex-wrap: wrap;
  }
  .item {
    flex-basis: 100%;
  }
}

.h1font {
  font-family: Roboto;
  font-style: normal;
  font-weight: 900;
  font-size: 32px;
  line-height: 40px;
  margin-top: 120px;
  margin-left: 40px;
  margin-right: 40px;
  color: #111259;
}
.h2font {
  font-family: Roboto;
  font-style: normal;
  font-weight: normal;
  font-size: 18px;
  line-height: 24px;
  margin-left: 40px;
  margin-right: 40px;
  color: #111259;
}

.button {
  font-family: Roboto;
  font-style: normal;
  font-weight: bold;
  font-size: 16px;
  line-height: 19px;
  width: 180px;
  height: 50px;

  display: flex;
  align-items: center;
  text-align: center;

  color: #100e5b;
  background: #ffffff;
  border: none;
  margin-left: 40px;
  padding: 15px 20px;
  margin-bottom: 10px;
}
.button:hover {
  background: #2e5bfb;
  color: #ffffff;
  border: none;
}
.button:active {
  background: #3400f6;
  color: #ffffff;
  border: none;
}

.button2 {
  font-family: Roboto;
  font-style: normal;
  font-weight: normal;
  font-size: 16px;
  line-height: 19px;

  text-align: center;

  color: #100e5b;
  border: 1px solid #ffffff;
  background-image: none;
  background: transparent;
  background-color: transparent;
  margin-left: 40px;
  padding: 15px 20px;
}
</style>