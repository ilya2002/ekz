
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
