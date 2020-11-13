module.exports = {
    devServer: {
      proxy: {
        '^/api': {
          target: 'http://172.17.146.29:8000', //check ip in wsl and port in symfony: ip -c a //PONER EN EL README
          changeOrigin: true,
          ws: true
        },
      }
    }
  }