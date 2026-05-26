# My Dystopia

Um espaço seguro e interativo projetado para o suporte e mapeamento de bem-estar mental, onde os utilizadores podem registar confissões anonimamente e mapear os seus estados de espírito.

## 🚀 Arquitetura do Projeto

O sistema foi desenvolvido utilizando uma arquitetura moderna e assíncrona para backend:
- **Frontend:** HTML5, CSS3 estruturado e JavaScript Nativo (Vanilla JS).
- **Backend de Testes:** PHP estruturado para receção, higienização e processamento de dados.
- **Comunicação (Ponte):** O Frontend comunica com o Backend via **Fetch API** (requisições assíncronas). Isso significa que os dados são enviados e processados em segundo plano, garantindo que o utilizador permaneça na página atual com respostas em tempo real, sem recarregamentos bruscos de tela.
- **Persistência Local:** Utilização de `localStorage` para simulação e feedback visual imediato no navegador.

## 📂 Estrutura de Ficheiros do Backend

Os seguintes ficheiros PHP processam as requisições assíncronas do sistema:
- `respostas_user.php`: Recebe os dados do formulário de mapeamento inicial.
- `processar_usuario.php`: Gerencia dinamicamente as ações de **Cadastro** e **Login** da página de utilizador através de flags ocultas.
- `salvar_confissao.php`: Recebe e processa os desabafos e confissões anónimas.
- `processar_recuperacao.php`: Valida as tentativas de redefinição de senha com base em perguntas de segurança.

---

## 🛠️ Como Executar e Testar o Projeto

Como o projeto utiliza processamento de backend com PHP, as páginas HTML **não** devem ser abertas diretamente com dois cliques no navegador, pois o protocolo `file://` não interpreta scripts de servidor.

Siga um dos métodos abaixo para rodar o servidor local:

### Método 1: Via Terminal (Servidor Embutido do PHP)
1. Abra o terminal (ou o terminal integrado do VS Code) na pasta raiz do projeto.
2. Execute o comando:
   ```bash
   php -S localhost:8000
