<div id="number-app">

<div class="form-group">
  <label class="col-form-label col-form-label-lg" for="inputLarge">Введите число от 1 до 9999</label>
  <input class="form-control form-control-lg" type="number" name="inputLarge" v-model="number" @input="recalculate">
</div>

<label class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" v-model="englishMode">
    <span class="custom-control-indicator"></span>
    <span class="custom-control-description">Английский режим</span>
</label>

<div class="card border-success mb-3" style="max-width: 20rem;">
  <div class="card-header">Результат конвертации</div>
  <div class="card-body text-success">
    <h4 class="card-title">{{converted}}<span v-if="englishMode">, сэр</span></h4>
  </div>
</div>
</div>