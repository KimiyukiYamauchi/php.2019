# データベース

- 新規のテーブルを作成する

``` sql
CREATE TABLE member (
	id INT PRIMARY KEY AUTO_INCREMENT,
	nam VARCHAR(255) NOT NULL,
	se CHAR(1) DEFAULT '男',
	old INT NOT NULL,
	enter DATE NOT NULL,
	memo VARCHAR(255) DEFAULT NULL);
```
- テーブルを確認する

``` sql
SHOW TABLES;
desc member;
```
- INSERT命令
	- 指定されたテーブルに、新規のレコードを追加する

``` sql
INSERT INTO テーブル名(フィールド名1,...) VALUES(フィールド値1,...)
```
``` sql
INSERT INTO member (id, nam, se, old, enter, memo)
VALUES (1, '山田太郎', '男', 20, '2011-10-25', null);
INSERT INTO member (nam, se, old, enter, memo)
VALUES ('斎藤花子', '女', 20, '2012-05-10', '紹介割引適用');
INSERT INTO member (nam, old, enter, memo)
VALUES ('鈴木次郎', 30, '2011-11-21', '再入力');
INSERT INTO member (nam, old, enter)
VALUES ('佐藤和夫', 40, '2012-05--07');
INSERT INTO member VALUES(5, '山本和美', '女', 32, '2012-06-01', null);
```

- UPDATE命令
	- 指定されたテーブルの既存のテーブルを更新する

``` sql
UPDATE テーブル名 SET フィールド名1 = フィールド値1,... [WHERE 条件]
```

``` sql
UPDATE member SET old = 21 WHERE id = 1;
```

- 最も簡単なSELECT命令

``` sql
SELECT * FROM member;
```

- 取得列を指定する

``` sql
SELECT nam, old FROM member;
```

- 条件式で取得行を絞り込む

``` sql
SELECT nam, old FROM member WHERE old >= 30;
```

- 複数の条件式を組み合わせる

``` sql
SELECT nam, sex, memo FROM member WHERE se = '男' AND memo IS NOT NULL;
```

| 演算子 | 概要 | 条件式の例 |
|:-------|:-----|:----------|
|=|等しい|nam = '山田太郎'|
|>|より大きい|old > 30|
|<|より小さい|old < 30|
|>=|以上|old >= 30|
|<=|以下|old <= 30|
|<>|等しくない|nam<>'山田太郎'|
|IS [NOT] NULL|NULLである(ない)|memo IS NULL|
|[NOT] LIKE|指定パターンに一致(一致しない)|nam LIKE '山%'|
|[NOT] BETWEEN|指定範囲に含まれる(含まれない)|old BETWEEN 25 AND 35|
|[NOT] IN|候補値のいずれかである(いずれでもない)|old IN(20, 30, 40)|

- データを集計する

``` sql
SELECT se, AVG(old) FROM member GROUP BY se;
```

| 関数 | 概要 |
|:-----|:-----|
|AVG(列名)|平均値|
|COUNT(列名)|件数|
|MAX(列名)|最大値|
|MIN(列名)|最小値|
|SUM(列名)|合計値|