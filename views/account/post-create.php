<h4>Создание поста</h4>
<form method="post">
    <div class="">
      <label class="form-label w-100">Название статьи
          <input type="text" class="form-control" name="name" required>
        </label>
    </div>
    <div class="">
        <label class="form-label w-100">Категория статьи
        <select class="form-select" aria-label="Категория статьи" required>
          <option selected>Выберите категорию статьи</option>
          <option value="1">Один</option>
          <option value="2">Два</option>
          <option value="3">Три</option>
        </select>
        </label>
    </div>
    <div class="">
        <label class="form-label w-100">Содержание статьи
            <textarea class="form-control" name="content" rows="3" required></textarea>
        </label>
    </div>
    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Создать пост</button>
    </div>
  
</form>