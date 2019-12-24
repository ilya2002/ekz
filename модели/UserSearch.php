
public $countryName;

/* правила валидации */
public function rules() {
   return [
    /* другие правила */
    [['countryName'], 'safe']
   ];
}

/**
 * Настроим поиск для использования
 * полей fullName и countryName
 */
public function search($params) {
    $query = Person::find();
    $dataProvider = new ActiveDataProvider([
        'query' => $query,
    ]);

    /**
     * Настройка параметров сортировки
     * Важно: должна быть выполнена раньше $this->load($params)
     * statement below
     */
     $dataProvider->setSort([
        'attributes' => [
            'id',
            'fullName' => [
                'asc' => ['first_name' => SORT_ASC, 'last_name' => SORT_ASC],
                'desc' => ['first_name' => SORT_DESC, 'last_name' => SORT_DESC],
                'label' => 'Full Name',
                'default' => SORT_ASC
            ],
            'countryName' => [
                'asc' => ['tbl_country.country_name' => SORT_ASC],
                'desc' => ['tbl_country.country_name' => SORT_DESC],
                'label' => 'Country Name'
            ]
        ]
    ]);

    if (!($this->load($params) && $this->validate())) {
        /**
         * Жадная загрузка данных модели Страны
         * для работы сортировки.
         */
        $query->joinWith(['country']);
        return $dataProvider;
    }

    $this->addCondition($query, 'id');
    $this->addCondition($query, 'first_name', true);
    $this->addCondition($query, 'last_name', true);
    $this->addCondition($query, 'country_id');

    // Фильтр по полному имени
    $query->andWhere('first_name LIKE "%' . $this->fullName . '%" ' .
        'OR last_name LIKE "%' . $this->fullName . '%"'
    );

    // Фильтр по стране
    $query->joinWith(['country' => function ($q) {
        $q->where('tbl_country.country_name LIKE "%' . $this->countryName . '%"');
    }]);

    return $dataProvider;
}

.........


/* Связь с моделью Страны*/
public function getCountry()
{
    return $this->hasOne(Country::className(), ['id' => 'country_id']);
}

/* Геттер для названия страны */
public function getCountryName() {
    return $this->country->country_name;
}

/* Название атрибута для вывода на экран */
public function attributeLabels() {
    return [
        /* Другие названия атрибутов */
        'fullName' => 'Full Name',
        'countryName' => 'Country Name',
    ];
}

........

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'fullName',
        'countryName',
        ['class' => 'yii\grid\ActionColumn'],
    ]
]);


..........
public function search($params)
{
    $query = Users::find();
    $query→joinWith(['role']);
    $dataProvider = new ActiveDataProvider([
        'query' => $query,
    ]);
    $dataProvider->sort->attributes['roleName'] = [
        'asc' => [User_roles::tableName().'.user_role' => SORT_ASC],
        'desc' => [User_roles::tableName().'.user_role' => SORT_DESC],
    ];
    $this→load($params);
    if (!$this->validate()) {
        return $dataProvider;
    }
    $query->andFilterWhere(['like', 'user_name', $this→user_name])
        ->andFilterWhere(['like', 'fio', $this→fio])
        ->andFilterWhere(['like', User_roles::tableName().'.user_role', $this→roleName]);
    return $dataProvider;
}
.......


2
3
4
5
6
7
<?=GridView::widget(['dataProvider' => $dataProvider,'filterModel' => $searchModel,
    'columns' => [['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'user_name','label' => 'Логин'],
        ['attribute' => 'fio','label' => 'ФИО'],
        ['attribute' => 'roleName','label' => 'Роль', 'value'=>'role.user_role'],
        ['class' => 'yii\grid\ActionColumn']]]);
?>
