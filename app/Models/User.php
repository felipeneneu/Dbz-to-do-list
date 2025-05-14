<?php

// 'namespace App\Models;' é como o sobrenome para todos os "catálogos" da nossa aplicação.
// Isso ajuda a organizar os diferentes tipos de informações que guardamos.
namespace App\Models;

use Exception;
use PDO;
use Src\DB\Database;

// 'class User' é o nome deste catálogo específico: "Catálogo de Usuários".
// Ele sabe como encontrar e lidar com as informações sobre os usuários do nosso site.
class User
{
    // 'public function findById($id)' é uma das coisas que este catálogo sabe fazer.
    // 'findById' significa "encontrar por ID". O 'id' é como o número de identificação único de cada usuário.
    // Então, essa tarefa serve para encontrar as informações de um usuário específico quando você dá o número dele.
    private $pdo;

    public function __construct(Database $db)
    {
        $this->pdo = $db->connect();
    }
    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function findByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        } else {
            return false;
        }
    }


    public function token($token, $email)
    {

        $stmt = $this->pdo->prepare("UPDATE usuarios SET reset_token  = :token, reset_expires = :reset_expires WHERE email = :email");

        $stmt->bindValue(':token', $token, PDO::PARAM_STR);
        $stmt->bindValue(':reset_expires', date('Y-m-d H:i:s', strtotime('+1 hour')), PDO::PARAM_STR);

        $stmt->bindValue(':email', $email, PDO::PARAM_STR);

        $stmt->execute();
    }


    public function resetToken($senha, $token)
    {
        $passwordHash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("UPDATE usuarios 
        SET senha = :senha, reset_token = NULL, reset_expires = NULL 
        WHERE reset_token = :reset_token");
        $stmt->bindValue(':reset_token', $token);
        $stmt->bindValue(':senha', $passwordHash);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Senha atualizada com sucesso!";
        } else {
            echo "Token inválido ou expirado.";
        }
    }



    public function findEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        } else {
            return false;
        }
    }


    public function register($nome, $email, $senha)
    {
        if (!empty($nome) && !empty($email) && !empty($senha)) {
            $stmt = $this->pdo->prepare("INSERT INTO usuarios (nome, email, senha, avatar_id, moedas) Values (:nome, :email, :senha, :avatar_id, :moedas)");
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':senha', password_hash($senha, PASSWORD_DEFAULT));
            $stmt->bindValue(':avatar_id', 1);
            $stmt->bindValue(':moedas', 0);

            $stmt->execute();

            return $this->pdo->lastInsertId();
        }
        return false;
    }


    public function auth($email, $senha)
    {
        if (empty($email) || empty($senha)) {
            return false;
        }
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            if ($user && password_verify($senha, $user->senha)) {
                return $user;
            }
            return false;
        } catch (Exception $e) {
            echo "Erro" . $e->getMessage();
            return false;
        }
    }

    public function avatar($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM avatares WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }


    public function xp($xp, $id)
    {
        if ($xp === 0) {
            $stmt = $this->pdo->prepare("UPDATE usuarios SET xp = 0 WHERE id = :id");
        } else {
            $stmt = $this->pdo->prepare("UPDATE usuarios SET xp = xp + :xp WHERE id = :id");
            $stmt->bindValue(':xp', $xp);
        }

        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
    public function level($level, $id)
    {
        $stmt = $this->pdo->prepare("UPDATE usuarios SET lvl = :lvl WHERE id = :id");
        $stmt->bindValue(':lvl', $level);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
    public function moedas($moedas, $id)
    {
        $stmt = $this->pdo->prepare("UPDATE usuarios SET moedas = moedas + :moedas WHERE id = :id");
        $stmt->bindValue(':moedas', $moedas);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
    public function update($id, $nome, $email, $senha)
    {
        $stmt = $this->pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id");
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
    public function updateAvatar($id, $avatar_id)
    {
        $stmt = $this->pdo->prepare("UPDATE usuarios SET avatar_id = :avatar_id WHERE id = :id");
        $stmt->bindValue(':avatar_id', $avatar_id);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
    public function updateMoedas($id, $moedas)
    {
        $stmt = $this->pdo->prepare("UPDATE usuarios SET moedas = :moedas WHERE id = :id");
        $stmt->bindValue(':moedas', $moedas);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
    public function updateLevel($id, $level)
    {
        $stmt = $this->pdo->prepare("UPDATE usuarios SET lvl = :lvl WHERE id = :id");
        $stmt->bindValue(':lvl', $level);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
    public function updateXp($id, $xp)
    {
        $stmt = $this->pdo->prepare("UPDATE usuarios SET xp = :xp WHERE id = :id");
        $stmt->bindValue(':xp', $xp);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
    public function updateSenha($id, $senha)
    {
        $stmt = $this->pdo->prepare("UPDATE usuarios SET senha = :senha WHERE id = :id");
        $stmt->bindValue(':senha', $senha);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
    public function updateEmail($id, $email)
    {
        $stmt = $this->pdo->prepare("UPDATE usuarios SET email = :email WHERE id = :id");
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
    public function updateNome($id, $nome)
    {
        $stmt = $this->pdo->prepare("UPDATE usuarios SET nome = :nome WHERE id = :id");
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}

/*

Perfeito! Agora estamos olhando para o User.php, que está dentro da pasta app/Models. Lembra que eu comparei os Models com "catálogos" de informações? Vamos ver como esse catálogo de "usuários" está funcionando por enquanto.

PHP

<?php

// 'namespace App\Models;' é como o sobrenome para todos os "catálogos" da nossa aplicação.
// Isso ajuda a organizar os diferentes tipos de informações que guardamos.
namespace App\Models;

// 'class User' é o nome deste catálogo específico: "Catálogo de Usuários".
// Ele sabe como encontrar e lidar com as informações sobre os usuários do nosso site.
class User
{
    // 'public function findById($id)' é uma das coisas que este catálogo sabe fazer.
    // 'findById' significa "encontrar por ID". O 'id' é como o número de identificação único de cada usuário.
    // Então, essa tarefa serve para encontrar as informações de um usuário específico quando você dá o número dele.
    public function findById($id)
    {
        // 'return $id;' por enquanto, este catálogo está fazendo algo bem simples.
        // Quando você pede para ele encontrar um usuário pelo 'id', ele simplesmente devolve o próprio 'id'.
        // Na vida real, um catálogo de usuários faria algo mais complexo aqui, como ir até um banco de dados
        // e procurar todas as informações do usuário com aquele 'id'.
        return $id;
    }
}
O que está acontecendo aqui:

O User Model é responsável por lidar com os dados dos usuários.
A função findById($id) é feita para buscar as informações de um usuário específico usando o seu $id.
No entanto, no código que você mostrou, essa função ainda não está buscando informações de verdade. Ela apenas recebe o $id e o devolve de volta.
Para dar sequência nesse Model:

Conectar ao Banco de Dados: Um Model de verdade precisa saber como conversar com o banco de dados onde as informações dos usuários estão guardadas. Isso geralmente envolve criar uma conexão com o banco de dados.

Escrever a Lógica de Busca: Dentro da função findById($id), você escreveria o código para realmente ir até o banco de dados, procurar na tabela de usuários o registro que tem o $id correspondente e trazer todas as informações desse usuário (nome, email, senha, etc.).

Retornar os Dados do Usuário: Em vez de apenas retornar o $id, a função deveria retornar um objeto ou um array contendo todos os dados do usuário que foram encontrados no banco de dados. Se nenhum usuário com aquele $id for encontrado, ela deveria retornar algo como null ou false.
*/