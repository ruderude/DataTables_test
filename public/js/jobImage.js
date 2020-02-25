jQuery(document).ready(function() {
  // ジョブの表示
  const job = $('#jobName').text();
  console.log(job);
  const sex = $('#sex').text();
  console.log(sex);
  // console.log(job);
  switch( job ) {
    case "0":
        $('#jobName').text("無職");
        break;
    case "1":
        $('#jobName').text("ボクシング");
        break;
    case "2":
        $('#jobName').text("キックボクシング");
        break;
    case "3":
        $('#jobName').text("空手");
        break;
    case "4":
        $('#jobName').text("カンフー");
        break;
    case "5":
        $('#jobName').text("テコンドー");
        break;
    case "6":
        $('#jobName').text("柔術");
        break;
    case "7":
        $('#jobName').text("相撲");
        break;
    case "8":
        $('#jobName').text("レスリング");
        break;
    case "9":
        $('#jobName').text("総合格闘技");
        break;
    case "10":
        $('#jobName').text("プロレス");
        break;
    case "11":
        $('#jobName').text("剣道");
        break;
    case "12":
        $('#jobName').text("弓道");
        break;
    case "13":
        $('#jobName').text("侍");
        break;
    case "14":
        $('#jobName').text("軍人");
        break;
    case "15":
        $('#jobName').text("その他");
        break;
    default:
        $('#jobName').text("無職");
        break;

}

  // ジョブイメージ
  // const jobImage = $('#jobImage').attr('src');
  if( job === "0" ) {
      switch( sex ) {
      case "男性":
          $('#jobImage').attr('src', '/storage/images/job/yoidore_tenshi.gif');
          break;
      case "中性":
          $('#jobImage').attr('src', '/storage/images/job/yoidore_tenshi.gif');
          break;
      case "女性":
          $('#jobImage').attr('src', '/storage/images/job/yoidore_tenshi.gif');
          break;
      }
  } else if( job === "1" ) {
      switch( sex ) {
      case "男性":
          $('#jobImage').attr('src', '/storage/images/job/boxer_conbi.gif');
          break;
      case "中性":
          $('#jobImage').attr('src', '/storage/images/job/boxer_woman_2.gif');
          break;
      case "女性":
          $('#jobImage').attr('src', '/storage/images/job/boxer_woman.gif');
          break;
      }
  } else if( job === "2" ) {
      switch( sex ) {
      case "男性":
          $('#jobImage').attr('src', '/storage/images/job/kick_boxer.gif');
          break;
      case "中性":
          $('#jobImage').attr('src', '/storage/images/job/boxer_woman_2.gif');
          break;
      case "女性":
          $('#jobImage').attr('src', '/storage/images/job/boxer_woman.gif');
          break;
      }
  } else if( job === "3" ) {
      switch( sex ) {
      case "男性":
          $('#jobImage').attr('src', '/storage/images/job/karate_mawashi.gif');
          break;
      case "中性":
          $('#jobImage').attr('src', '/storage/images/job/karate_uke_jyo.gif');
          break;
      case "女性":
          $('#jobImage').attr('src', '/storage/images/job/tobigeri_6.gif');
          break;
      }
  } else if( job === "4" ) {
      switch( sex ) {
      case "男性":
          $('#jobImage').attr('src', '/storage/images/job/kung_fu.gif');
          break;
      case "中性":
          $('#jobImage').attr('src', '/storage/images/job/sholin.gif');
          break;
      case "女性":
          $('#jobImage').attr('src', '/storage/images/job/kung_fu_2.gif');
          break;
      }
  } else if( job === "5" ) {
      switch( sex ) {
      case "男性":
          $('#jobImage').attr('src', '/storage/images/job/tekondo.gif');
          break;
      case "中性":
          $('#jobImage').attr('src', '/storage/images/job/tekondo.gif');
          break;
      case "女性":
          $('#jobImage').attr('src', '/storage/images/job/tobigeri_6.gif');
          break;
      }
  } else if( job === "6" ) {
      switch( sex ) {
      case "男性":
          $('#jobImage').attr('src', '/storage/images/job/judo_uchimata_2.gif');
          break;
      case "中性":
          $('#jobImage').attr('src', '/storage/images/job/judo_player.gif');
          break;
      case "女性":
          $('#jobImage').attr('src', '/storage/images/job/judo_uchimata_w2.gif');
          break;
      }
  } else if( job === "7" ) {
      switch( sex ) {
      case "男性":
          $('#jobImage').attr('src', '/storage/images/job/sumo_yokozuna_2.gif');
          break;
      case "中性":
          $('#jobImage').attr('src', '/storage/images/job/harite_5.gif');
          break;
      case "女性":
          $('#jobImage').attr('src', '/storage/images/job/sumo_shiko_2.gif');
          break;
      }
  } else if( job === "8" ) {
      switch( sex ) {
      case "男性":
          $('#jobImage').attr('src', '/storage/images/job/wrestling_player_4.gif');
          break;
      case "中性":
          $('#jobImage').attr('src', '/storage/images/job/wrestling_player_5.gif');
          break;
      case "女性":
          $('#jobImage').attr('src', '/storage/images/job/wrestling_player_6.gif');
          break;
      }
  } else if( job === "9" ) {
      switch( sex ) {
      case "男性":
          $('#jobImage').attr('src', '/storage/images/job/sogo_mountpanch.gif');
          break;
      case "中性":
          $('#jobImage').attr('src', '/storage/images/job/sogo_3.gif');
          break;
      case "女性":
          $('#jobImage').attr('src', '/storage/images/job/boxer_woman_2.gif');
          break;
      }
  } else if( job === "10" ) {
      switch( sex ) {
      case "男性":
          $('#jobImage').attr('src', '/storage/images/job/back-dropp.gif');
          break;
      case "中性":
          $('#jobImage').attr('src', '/storage/images/job/giant_swing.gif');
          break;
      case "女性":
          $('#jobImage').attr('src', '/storage/images/job/elbo.gif');
          break;
      }
  } else if( job === "11" ) {
      switch( sex ) {
      case "男性":
          $('#jobImage').attr('src', '/storage/images/job/kendo_2.gif');
          break;
      case "中性":
          $('#jobImage').attr('src', '/storage/images/job/kendo_keiko.gif');
          break;
      case "女性":
          $('#jobImage').attr('src', '/storage/images/job/naginata.gif');
          break;
      }
  } else if( job === "12" ) {
      switch( sex ) {
      case "男性":
          $('#jobImage').attr('src', '/storage/images/job/kyudo_play.gif');
          break;
      case "中性":
          $('#jobImage').attr('src', '/storage/images/job/kyudo_play.gif');
          break;
      case "女性":
          $('#jobImage').attr('src', '/storage/images/job/kyudo_play.gif');
          break;
      }
  } else if( job === "13" ) {
      switch( sex ) {
      case "男性":
          $('#jobImage').attr('src', '/storage/images/job/samurai_action.gif');
          break;
      case "中性":
          $('#jobImage').attr('src', '/storage/images/job/sinsengumi_taishi_3.gif');
          break;
      case "女性":
          $('#jobImage').attr('src', '/storage/images/job/samurai.gif');
          break;
      }
  } else if( job === "14" ) {
      switch( sex ) {
      case "男性":
          $('#jobImage').attr('src', '/storage/images/job/combat_hofuku.gif');
          break;
      case "中性":
          $('#jobImage').attr('src', '/storage/images/job/combat_hofuku_2.gif');
          break;
      case "女性":
          $('#jobImage').attr('src', '/storage/images/job/model_soldier.gif');
          break;
      }
  } else if( job === "15" ) {
      switch( sex ) {
      case "男性":
          $('#jobImage').attr('src', '/storage/images/job/kasa_samurai.gif');
          break;
      case "中性":
          $('#jobImage').attr('src', '/storage/images/job/vocalist.gif');
          break;
      case "女性":
          $('#jobImage').attr('src', '/storage/images/job/modern_women.gif');
          break;
      }
  }

});
