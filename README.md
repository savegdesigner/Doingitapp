![Doingit App Logo](https://github.com/savegdesigner/Doingitapp/blob/master/doingit-logo.svg)

## Crie e planeje suas listas de tarefas! :ledger: :gem:

### Autor 
- [**_Vinicius Savegnago_**](https://www.instagram.com/vsgdesigner/)

---

## Design do Projeto

[![Figma Logo](https://github.com/savegdesigner/Doingitapp/blob/master/figma-logo.svg)](https://www.figma.com/file/Coe33UYVqTItWYO3cv4HVe/DoingIt-App?node-id=0%3A1)

## Instalando o projeto
1. Faça um clone do repositório. `$ git clone`
2. Configure corretamente sua porta para acesso.
3. Crie o banco de dados. (Siga a estrutura)
4. O projeto estará disponível em ``http://localhost/Doingitapp``

---

## Estrutura do banco de dados

| projeto_pi_db | | | | | |
| ------------- | ------------- | ------------- | ------------- | ------------- | ------------- |
| *users*  | id_user  | username_user | email_user | password_user | |
| *lists* | id | list_name| id_user |  | |
| *tasks*  | task_id  | task_name | list_id | user_id | task_complete |
| *rate*   | rate_id  | rate_value| id_user |  | |

---

## Tecnologias utilizadas

- HTML
- CSS
- Javascript Vanilla
- PHP
