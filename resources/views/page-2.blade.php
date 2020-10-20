@extends('admin.layout')

@section('content')


    <div class="col-12 col-sm-6">
        <div class="card card-primary">
            <div class="card-header d-flex align-items-center">
                <h3 class="card-title mb-0">Добавить организацию</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form">
                <div class="card-body">
                    <div class="form-group">
                        <label>Название</label>
                        <input type="text" class="form-control" placeholder="Введите название организации">
                    </div>
                    <div class="form-group">
                        <label>Выберите страну</label>
                        <select class="form-control" style="width: 100%;">
                            <option selected="selected">Казахстан</option>
                            <option>Россия</option>
                            <option>Америка</option>
                            <option>Германия</option>
                            <option>Китай</option>
                            <option>Япония</option>
                            <option>Италия</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Выберите город</label>
                        <select class="form-control" style="width: 100%;">
                            <option selected="selected">Алматы</option>
                            <option>Астана</option>
                            <option>Шымкент</option>
                            <option>Актобе</option>
                            <option>Талдыкорган</option>
                            <option>Павлодар</option>
                            <option>Актау</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Загрузите логотип организации</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Какой то чекбокс</label>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </form>
        </div>
    </div>


    <div class="col-12">
        <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                    <li class="pt-2 px-3"><h3 class="card-title">Astana Hub</h3></li>
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Общие</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Настройки</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Пользователи</a>
                    </li>
                    <li class="nav-item d-none">
                        <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill" href="#custom-tabs-two-settings" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="false">Settings</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                        <div class="">
                            <label>Город: </label>
                            <span>
                                Казахстан, Алматы
                            </span>
                        </div>

                        <div class="">
                            <label>Участники: </label>
                            <span>
                                2,000
                            </span>
                        </div>

                        <div class="">
                            <label>Программы, услуги: </label>
                            <span>
                                2,300
                            </span>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">

                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1">Программы</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                <label class="custom-control-label" for="customSwitch2">Услуги</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" id="customSwitch3">
                                <label class="custom-control-label" for="customSwitch3">Мероприятия</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" id="customSwitch4">
                                <label class="custom-control-label" for="customSwitch4">Биржа</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" id="customSwitch5">
                                <label class="custom-control-label" for="customSwitch5">Вакансии</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input checked type="checkbox" class="custom-control-input" id="customSwitch6">
                                <label class="custom-control-label" for="customSwitch6">Закупки</label>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <h3 class="card-title mb-0">Список пользователей</h3>

                                    <div class="card-tools d-flex align-items-center ml-auto">

                                        <div class="input-group mr-3" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Поиск">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-outline-secondary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>

                                        <button class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModalCenter">
                                            Пригласить пользователя
                                        </button>

                                    </div>

                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Приглашение пользователя</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" placeholder="Введите почту">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Выберите роль</label>
                                                        <select class="form-control" style="width: 100%;">
                                                            <option selected="selected">Админ</option>
                                                            <option>Оператор</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-success">Пригласить</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Имя</th>
                                            <th>Email</th>
                                            <th>Тип</th>
                                            <th>Статус приглашения</th>
                                            <th>Дата окончания</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>183</td>
                                            <td>Алима Даттебаё</td>
                                            <td>dalima@gmail.com</td>
                                            <td>Инвестор</td>
                                            <td><span class="text-info">Отправлен</span></td>
                                            <td>21.10.2020</td>
                                        </tr>
                                        <tr>
                                            <td>219</td>
                                            <td>Нурлан Узумакиулы</td>
                                            <td>uzum_na97@gmail.com</td>
                                            <td>Стартапер</td>
                                            <td><span class="text-danger">Отклонен</span></td>
                                            <td>21.10.2020</td>
                                        </tr>
                                        <tr>
                                            <td>657</td>
                                            <td>Канагат Хатаки</td>
                                            <td>kana-hatake@gmail.com</td>
                                            <td>Участник</td>
                                            <td><span class="text-success">Принят</span></td>
                                            <td>21.10.2020</td>
                                        </tr>
                                        <tr>
                                            <td>219</td>
                                            <td>Нурлан Узумакиулы</td>
                                            <td>uzum_na97@gmail.com</td>
                                            <td>Стартапер</td>
                                            <td><span class="text-danger">Отклонен</span></td>
                                            <td>21.10.2020</td>
                                        </tr>
                                        <tr>
                                            <td>219</td>
                                            <td>Нурлан Узумакиулы</td>
                                            <td>uzum_na97@gmail.com</td>
                                            <td>Стартапер</td>
                                            <td><span class="text-danger">Отклонен</span></td>
                                            <td>21.10.2020</td>
                                        </tr>
                                        <tr>
                                            <td>219</td>
                                            <td>Нурлан Узумакиулы</td>
                                            <td>uzum_na97@gmail.com</td>
                                            <td>Стартапер</td>
                                            <td><span class="text-danger">Отклонен</span></td>
                                            <td>21.10.2020</td>
                                        </tr>
                                        <tr>
                                            <td>219</td>
                                            <td>Нурлан Узумакиулы</td>
                                            <td>uzum_na97@gmail.com</td>
                                            <td>Стартапер</td>
                                            <td><span class="text-danger">Отклонен</span></td>
                                            <td>21.10.2020</td>
                                        </tr>
                                        <tr>
                                            <td>219</td>
                                            <td>Нурлан Узумакиулы</td>
                                            <td>uzum_na97@gmail.com</td>
                                            <td>Стартапер</td>
                                            <td><span class="text-danger">Отклонен</span></td>
                                            <td>21.10.2020</td>
                                        </tr>
                                        <tr>
                                            <td>219</td>
                                            <td>Нурлан Узумакиулы</td>
                                            <td>uzum_na97@gmail.com</td>
                                            <td>Стартапер</td>
                                            <td><span class="text-danger">Отклонен</span></td>
                                            <td>21.10.2020</td>
                                        </tr>
                                        <tr>
                                            <td>219</td>
                                            <td>Нурлан Узумакиулы</td>
                                            <td>uzum_na97@gmail.com</td>
                                            <td>Стартапер</td>
                                            <td><span class="text-danger">Отклонен</span></td>
                                            <td>21.10.2020</td>
                                        </tr>
                                        <tr>
                                            <td>219</td>
                                            <td>Нурлан Узумакиулы</td>
                                            <td>uzum_na97@gmail.com</td>
                                            <td>Стартапер</td>
                                            <td><span class="text-danger">Отклонен</span></td>
                                            <td>21.10.2020</td>
                                        </tr>
                                        <tr>
                                            <td>219</td>
                                            <td>Нурлан Узумакиулы</td>
                                            <td>uzum_na97@gmail.com</td>
                                            <td>Стартапер</td>
                                            <td><span class="text-danger">Отклонен</span></td>
                                            <td>21.10.2020</td>
                                        </tr>
                                        <tr>
                                            <td>219</td>
                                            <td>Нурлан Узумакиулы</td>
                                            <td>uzum_na97@gmail.com</td>
                                            <td>Стартапер</td>
                                            <td><span class="text-danger">Отклонен</span></td>
                                            <td>21.10.2020</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.card -->
            <div class="card-footer">
                <button class="btn btn-success">
                    Принять
                </button>
            </div>
        </div>
    </div>
@endsection
