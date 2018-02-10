<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CompraSearch represents the model behind the search form of `app\models\Compra`.
 */
class CompraSearch extends Compra
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcompra','idusuario', 'idpaquete', 'tipo_pago'], 'integer'],
            [['fecha_registro', 'fecha_aprovacion','fecha_pago'], 'safe'],
            [['precio'], 'number'],
            [['nombre_factura', 'nit_factura'], 'string', 'max' => 50],
            [['session'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Compra::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idcompra' => $this->idcompra,
            'idusuario' => $this->idusuario,
            'idpaquete' => $this->idpaquete,
            'tipo_pago' => $this->tipo_pago,
            'fecha_registro' => $this->fecha_registro,
            'fecha_aprovacion' => $this->fecha_aprovacion,
            'fecha_pago' => $this->fecha_pago,
            'precio' => $this->precio,
        ]);

        $query->andFilterWhere(['like', 'nombre_factura', $this->nombre_factura])
            ->andFilterWhere(['like', 'nit_factura', $this->nit_factura]);

        return $dataProvider;
    }
}
