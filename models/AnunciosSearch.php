<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AnunciosSearch represents the model behind the search form of `app\models\Anuncios`.
 */
class AnunciosSearch extends Anuncios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idanuncio', 'idcategoria', 'idusuario', 'estado', 'enable', 'idcompra', 'filtro'], 'integer'],
            [['titulo', 'decripcion', 'otra_descripcion', 'codigo', 'foto', 'precio', 'fecha_registro', 'fecha_aprobado'], 'safe'],
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
        $query = Anuncios::find();

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
            'idanuncio' => $this->idanuncio,
            'idcategoria' => $this->idcategoria,
            'idusuario' => $this->idusuario,
            'estado' => $this->estado,
            'enable' => $this->enable,
            'fecha_registro' => $this->fecha_registro,
            'fecha_aprobado' => $this->fecha_aprobado,
            'idcompra' => $this->idcompra,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'decripcion', $this->decripcion])
            ->andFilterWhere(['like', 'otra_descripcion', $this->otra_descripcion])
            ->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'precio', $this->precio]);
        if (isset($params['vendedor'])) {
            $query->andFilterWhere(['idusuario'=> $params['vendedor']]);
        }
        if (isset($params['categorias'])) {
            $tmp = array();
            foreach ($params['categorias'] as $key => $item)
                $tmp[] = $key;
            $query->andFilterWhere(['IN', 'idcategoria', $tmp]);
        }
        if (isset($params['precio'])) {
            $tmp = explode(',',$params['precio']);
            $query->andFilterWhere(['between', 'cast(precio as unsigned)', $tmp[0],$tmp[1]]);
        }
        if (isset($params['condicion']) OR isset($params['talla']) OR isset($params['material']) OR isset($params['marca']) OR isset($params['color']) OR isset($params['ciudad'])) {
            $query->innerJoinWith('anunciosFiltros');
            if (isset($params['condicion'])) {
                $tmp = array();
                foreach ($params['condicion'] as $key => $item)
                    $tmp[] = $key;
                $query->andFilterWhere(['IN', 'idcondicion', $tmp]);
            }
            if (isset($params['talla'])) {
                $tmp = array();
                foreach ($params['talla'] as $key => $item)
                    $tmp[] = $key;
                $query->andFilterWhere(['IN', 'idtalla', $tmp]);
            }
            if (isset($params['material'])) {
                $tmp = array();
                foreach ($params['material'] as $key => $item)
                    $tmp[] = $key;
                $query->andFilterWhere(['IN', 'idmaterial', $tmp]);
            }
            if (isset($params['marca'])) {
                $tmp = array();
                foreach ($params['marca'] as $key => $item)
                    $tmp[] = $key;
                $query->andFilterWhere(['IN', 'idmarca', $tmp]);
            }
            if (isset($params['color'])) {
                $tmp = array();
                foreach ($params['color'] as $key => $item)
                    $tmp[] = $key;
                $query->andFilterWhere(['IN', 'idcolores', $tmp]);
            }
            if (isset($params['ciudad'])) {
                $tmp = array();
                foreach ($params['ciudad'] as $key => $item)
                    $tmp[] = $key;
                $query->andFilterWhere(['IN', 'idciudad', $tmp]);
            }
        }
        /*if (isset($params['filtro'])) {
            $tmp = array();
            foreach ($params['filtro'] as $key => $item)
                $tmp[] = $key;
            $query->innerJoinWith('anunciosFiltros');
            $query->andFilterWhere(['IN', 'idfiltro', $tmp]);
        }*/

        $query->distinct();
        return $dataProvider;
    }
}
