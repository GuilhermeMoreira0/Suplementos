# Suplementos

Breve descrição do projeto.

## Pré-requisitos

Antes de iniciar, certifique-se de ter instalado:

- [Git](https://git-scm.com/)
- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)

## Configuração Inicial

1. **Clonar o repositório**

```
git clone https://github.com/GuilhermeMoreira0/Suplementos.git
cd Suplementos
code .
```

# Construir e rodar o projeto usando Docker Compose
Para ambientes de desenvolvimento e produção, você terá arquivos de configuração do Docker Compose separados. A seguir, são apresentadas as instruções para executar o projeto em cada ambiente.

## Desenvolvimento
No ambiente de desenvolvimento, o Docker Compose utiliza o arquivo docker-compose.override.yml (se presente) junto com o docker-compose.yml por padrão.

1. **Iniciar o projeto**
```
docker-compose up --build
```
> Esse comando constrói a imagem do seu aplicativo (se necessário) e inicia os serviços definidos no seu docker-compose.yml e docker-compose.override.yml.

2. **Parar o projeto**
```
docker-compose down
```

## Produção
No ambiente de produção, você utilizará o docker-compose.prod.yml para sobrescrever ou adicionar configurações específicas de produção.
1. **Enviroments**
Crie um arquivo .env na raiz do projeto e preencha-o com as variáveis de ambiente necessárias para produção. Exemplo:
```
$servername = "db";
$username = "myuser";
$password = "mypassword";
$database = "mydatabase";
```

2. **Iniciar o projeto em produção**
```
docker-compose -f docker-compose.yml -f docker-compose.prod.yml up --build
```
> Esse comando instrui o Docker Compose a usar a configuração base junto com as configurações específicas de produção.

3. **Parar o projeto em produção**
```
docker-compose -f docker-compose.yml -f docker-compose.prod.yml down
```

# Acessar o Aplicativo
Após iniciar o aplicativo, você pode acessá-lo abrindo http://localhost:8080/index.php no seu navegador, assumindo que o docker-compose mapeou a porta 8080 do contêiner para a porta 8080 do seu host.
